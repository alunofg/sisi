<?php

namespace App\Presenters;

use App\Transformers\LogsTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class LogsPresenter.
 *
 * @package namespace App\Presenters;
 */
class LogsPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new LogsTransformer();
    }
}
