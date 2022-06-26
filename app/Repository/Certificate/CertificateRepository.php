<?php


namespace App\Repository\Certificate;


use App\Enum\CertificatePrice;
use App\Http\Requests\CertificateStoreRequest;
use App\Mail\CertificateMail;
use App\Models\Certificate;
use App\Models\User;
use App\Repository\Certificate\Contract\CertificateRepositoryInterface;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;
use Illuminate\View\View;

class CertificateRepository implements CertificateRepositoryInterface
{
    /**
     * @param CertificateStoreRequest $certificateStoreRequest
     * @return Redirect|View
     */
    public function store(CertificateStoreRequest $certificateStoreRequest): object
    {
        $totalPrice = $certificateStoreRequest->number_of_trees * CertificatePrice::PRICE_PER_TREE;
        if ($totalPrice > $certificateStoreRequest->user()->getBalance()) {
            return \redirect()->route('balance');
        }
        if ($totalPrice == $certificateStoreRequest->to_be_paid) {
            $newCertificate = new Certificate();
            $newCertificate->name = $certificateStoreRequest->name;
            $newCertificate->last_name = $certificateStoreRequest->last_name;
            $newCertificate->email = $certificateStoreRequest->email;
            $newCertificate->name = $certificateStoreRequest->name;
            $newCertificate->last_name = $certificateStoreRequest->last_name;
            $newCertificate->user_id = $certificateStoreRequest->user()->id;
            $newCertificate->plantation_year = $certificateStoreRequest->plantation_year;
            $newCertificate->number_of_trees = $certificateStoreRequest->number_of_trees;
            $newCertificate->total_price = $totalPrice;
            $newCertificate->code = Str::random();
            $newCertificate->save();

            User::balanceExpense($certificateStoreRequest->user(), $totalPrice);

            Mail::to($newCertificate->email)->send(new CertificateMail($newCertificate));
        }
        return \redirect()->back()->with(['success' => 'Сертефикат отправлен вам на почту!']);
    }

    public function softDelete(int $id)
    {
        Certificate::find($id)->delete();

        return \redirect()->back()->with(['success' => 'Сертефикать удален!']);
    }
}
