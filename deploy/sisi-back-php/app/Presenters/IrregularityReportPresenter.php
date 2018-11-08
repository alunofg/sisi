<?php

namespace App\Presenters;

use App\Transformers\IrregularityReportTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class IrregularityReportPresenter.
 *
 * @package namespace App\Presenters;
 */
class IrregularityReportPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new IrregularityReportTransformer();
    }
}
