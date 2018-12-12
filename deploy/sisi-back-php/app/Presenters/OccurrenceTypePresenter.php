<?php

namespace App\Presenters;

use App\Transformers\OccurrenceTypeTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class OccurrenceTypePresenter.
 *
 * @package namespace App\Presenters;
 */
class OccurrenceTypePresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new OccurrenceTypeTransformer();
    }
}
