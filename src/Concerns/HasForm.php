<?php

namespace Hanafalah\ModuleExamination\Concerns;

trait HasForm{
    public function form(){
        return $this->hasOneModel('Form', 'morph', method_exists($this, 'getMorph') ? $this->getMorph() : $this->getMorphClass())
            ->where('flag', $this->FormModel()->getMorphClass());
    }
}
