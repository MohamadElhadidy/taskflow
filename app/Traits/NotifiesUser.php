<?php



namespace App\Traits;

use WireUi\Traits\WireUiActions;

trait NotifiesUser
{
    use WireUiActions;

    public function notifyInfo($title, $description = ''): void
    {
        $this->notification()->info($title, $description);
    }

    public function notifyWarning($title, $description = ''): void
    {
        $this->notification()->warning($title, $description);
    }

    public function notifyError($title, $description = ''): void
    {
        $this->notification()->error($title, $description);
    }

    public function notifySuccess($title, $description = ''): void
    {
        $this->notification()->success($title, $description);
    }
}

