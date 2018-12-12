<?php

namespace App\Presenters;

use App\Transformers\AttachmentsTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class AttachmentsPresenter.
 *
 * @package namespace App\Presenters;
 */
class AttachmentsPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new AttachmentsTransformer();
    }
}
