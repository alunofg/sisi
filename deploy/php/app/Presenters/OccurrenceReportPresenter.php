<?php

namespace App\Presenters;

use App\Transformers\OccurrenceReportTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class OccurrenceReportPresenter.
 *
 * @package namespace App\Presenters;
 */
class OccurrenceReportPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new OccurrenceReportTransformer();
    }
}
