<?php

namespace App\Presenters;

use App\Transformers\OccurrenceObjectTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class OccurrenceObjectPresenter.
 *
 * @package namespace App\Presenters;
 */
class OccurrenceObjectPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new OccurrenceObjectTransformer();
    }
}
