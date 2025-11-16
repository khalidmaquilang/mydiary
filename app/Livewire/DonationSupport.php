<?php

namespace App\Livewire;

use Livewire\Attributes\Validate;
use Livewire\Component;

class DonationSupport extends Component
{
    #[Validate('nullable|numeric|min:1|max:10000')]
    public ?float $amount = 5.0;

    public string $paypalUsername = 'your-paypal-username';

    public bool $showQrCode = false;

    public string $donationMessage = 'Support this app by making a donation! Your contribution helps keep this project running and improving.';

    public function mount(?string $paypalUsername = null): void
    {
        if ($paypalUsername) {
            $this->paypalUsername = $paypalUsername;
        }
    }

    public function toggleDonationMethod(): void
    {
        $this->showQrCode = ! $this->showQrCode;
    }

    public function redirectToPayPal(): void
    {
        $this->validate();

        $paypalUrl = "https://paypal.me/{$this->paypalUsername}";

        if ($this->amount) {
            $paypalUrl .= "/{$this->amount}";
        }

        $this->dispatch('redirect', url: $paypalUrl);
    }

    public function getQrCodeUrl(): string
    {
        $instapay = '00020101021127610012com.p2pqrpay0111BOPIPHMMXXX0208999644030414000091191949195204601653036085802PH5905Eskie6011Makati City63047182';

        // Using QR Server API for QR code generation
        return "https://api.qrserver.com/v1/create-qr-code/?size=200x200&data=" . urlencode($instapay);
    }

    public function render()
    {
        return view('livewire.donation-support');
    }
}
