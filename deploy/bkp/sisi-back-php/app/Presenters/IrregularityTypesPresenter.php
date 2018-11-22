<?php

namespace App\Presenters;

use App\Transformers\IrregularityTypesTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class IrregularityTypesPresenter.
 *
 * @package namespace App\Presenters;
 */
class IrregularityTypesPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new IrregularityTypesTransformer();
    }
}
