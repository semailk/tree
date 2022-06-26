<?php


namespace App\Services;


use App\Models\Certificate;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CertificateService
{
    /**
     * @return View
     */
    public function activates(): View
    {
        $certificates = User::query()->find(auth()->id())->certificates->map(function (Certificate $certificate) {
            return collect($certificate)->toArray();
        });

        return \view('pages.certificate-activate', compact('certificates'));
    }

    /**
     * @param Request $request
     * @return object
     */
    public function certificateActivate(Request $request): object
    {
        /** @var Certificate $certificate */
        $certificate = Certificate::query()->where('code', '=', $request->code)->first();

        if (empty($certificate)) {
            return \redirect()->back()->with(['errors' => 'Сертификат не найден!']);
        }

        $certificate->status = true;
        $certificate->save();

        return \redirect()->back()->with(['success' => 'Сертификат активирован!']);
    }
}
