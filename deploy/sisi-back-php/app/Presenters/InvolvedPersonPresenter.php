<?php

namespace App\Presenters;

use App\Transformers\InvolvedPersonTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class InvolvedPersonPresenter.
 *
 * @package namespace App\Presenters;
 */
class InvolvedPersonPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new InvolvedPersonTransformer();
    }
}
