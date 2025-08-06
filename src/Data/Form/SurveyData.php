<?php

namespace Hanafalah\ModuleExamination\Data\Form;

use Hanafalah\ModuleExamination\Contracts\Data\Form\SurveyData as DataSurveyData;
use Hanafalah\ModuleExamination\Data\Form\FormData;

class SurveyData extends FormData implements DataSurveyData
{
    public static function before(array &$attributes){
        $attributes['flag'] ??= 'Survey';
        parent::before($attributes);
    }

    public static function after(self $data): self{
        $new = self::new();
        $dynamic_forms = &$data->props['dynamic_forms'];
        $new->initializeDynamicForm($dynamic_forms);
        return $data;
    }

    private function initializeDynamicForm(&$dynamic_forms){
        foreach ($dynamic_forms as &$dynamic_form) {
            $dynamic_form['options'] ??= [];
            $dynamic_form['dynamic_forms'] ??= [];
            if (isset($dynamic_form['options']) && count($dynamic_form['options']) > 0){
                foreach ($dynamic_form['options'] as &$option) {
                    if (isset($option['dynamic_forms']) && count($option['dynamic_forms']) > 0){
                        $this->initializeDynamicForm($option['dynamic_forms']);
                    }else{
                        $option['dynamic_forms'] = [];
                    }
                    
                    $option['surveys'] ??= [];
                    $option['forms'] ??= [];
                    if (isset($dynamic_form['default_value']) && $dynamic_form['default_value']['label'] == $option['label']){
                        $dynamic_form['default_value'] = $option;
                    }
                }
            }
            if (isset($dynamic_form['dynamic_forms']) && count($dynamic_form['dynamic_forms']) > 0){
                $this->initializeDynamicForm($dynamic_form['dynamic_forms']);
            }else{
                $dynamic_form[$dynamic_form['key']] ??= null;
            }
        }
    }
}