<?php

namespace App\Livewire;

use App\Models\Ecard;
use Livewire\Component;
use Livewire\WithFileUploads;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Str;

class CreateEcard extends Component
{
    use WithFileUploads;

    public $tab = 'simple';

    // Simple Mode
    public $recipient_name = '';
    public $message = '';
    public $recipient_phone = '';

    // Custom Mode
    public $custom_image;
    public $custom_recipient_name = '';
    public $custom_message = '';
    public $text_x = 200;
    public $text_y = 290;
    public $font_size = 10;

    public function createEcard()
    {
        // ================= SIMPLE MODE =================
        if ($this->tab === 'simple') {
            $this->validate([
                'recipient_name' => 'required|string|max:255',
                'recipient_phone' => 'required|string|max:20',
                'message' => 'nullable|string',
            ]);

            $uniqueCode = Str::uuid()->toString();

            // QR Code inatumia IP yako halisi
            $qrData = url("/scan/{$uniqueCode}");

            $qrPath = 'qrcodes/' . uniqid() . '.png';
            $qrImage = QrCode::format('png')
                        ->size(300)
                        ->margin(2)
                        ->generate($qrData);

            Storage::disk('public')->put($qrPath, $qrImage);

            Ecard::create([
                'user_id'         => auth()->id(),
                'title'           => 'Mwaliko wa ' . $this->recipient_name,
                'message'         => $this->message ?? '',
                'recipient_name'  => $this->recipient_name,
                'recipient_phone' => $this->recipient_phone,
                'image_path'      => $qrPath,
                'unique_code'     => $uniqueCode,
            ]);
        } 
        // ================= CUSTOM MODE =================
        else {
            $this->validate([
                'custom_image' => 'required|image|max:5120',
                'custom_recipient_name' => 'required|string|max:255',
                'text_x' => 'required|integer|min:0',
                'text_y' => 'required|integer|min:0',
                'font_size' => 'required|integer|min:10|max:150',
            ]);

            $uniqueCode = Str::uuid()->toString();

            // QR Code inatumia IP yako halisi
            $qrData = url("/scan/{$uniqueCode}");

            // Save background image
            $imagePath = $this->custom_image->store('ecards/custom', 'public');
            $fullImagePath = storage_path('app/public/' . $imagePath);

            // Generate QR
            $qrPath = 'qrcodes/' . uniqid() . '.png';
            $qrImage = QrCode::format('png')
                        ->size(120)
                        ->margin(1)
                        ->generate($qrData);

            Storage::disk('public')->put($qrPath, $qrImage);
            $qrFullPath = storage_path('app/public/' . $qrPath);

            // Create image
            $img = Image::make($fullImagePath);

            if ($this->custom_recipient_name) {
                $img->text(
                    $this->custom_recipient_name,
                    (int)$this->text_x,
                    (int)$this->text_y,
                    function ($font) {
                        $font->file(public_path('fonts/TitilliumWeb-ExtraLight.ttf'));
                        $font->size(max(30, min(150, (int)$this->font_size)));
                        $font->color('#1F2937');
                        $font->align('left');
                        $font->valign('top');
                    }
                );
            }

            $img->insert($qrFullPath, 'bottom-left', 40, 40);

            $finalPath = 'ecards/final/' . uniqid() . '.png';
            Storage::disk('public')->put($finalPath, (string) $img->encode('png'));

            Ecard::create([
                'user_id'         => auth()->id(),
                'title'           => 'Mwaliko wa ' . $this->custom_recipient_name,
                'message'         => $this->custom_message ?? '',
                'recipient_name'  => $this->custom_recipient_name,
                'recipient_phone' => '',
                'image_path'      => $finalPath,
                'qr_code_path'    => $qrPath,
                'text_x'          => (int)$this->text_x,
                'text_y'          => (int)$this->text_y,
                'font_size'       => (int)$this->font_size,
                'unique_code'     => $uniqueCode,
            ]);
        }

        session()->flash('status', 'E-Card imetengenezwa kwa mafanikio!');
        return redirect()->route('dashboard');
    }

    public function render()
    {
        return view('livewire.create-ecard')
               ->layout('layouts.app');
    }
}