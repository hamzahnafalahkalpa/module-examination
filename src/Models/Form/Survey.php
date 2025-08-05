<?php

namespace Hanafalah\ModuleExamination\Models\Form;

use Hanafalah\ModuleExamination\Resources\Survey\{ViewSurvey,ShowSurvey};

class Survey extends Form
{
    protected $table = 'unicodes';

    const TYPE_INPUT      = 'INPUT';
    const TYPE_TOGGLE     = 'TOGGLE';
    const TYPE_TEXTAREA   = 'TEXT_AREA';
    const TYPE_RADIO      = 'RADIO';
    const TYPE_CHECKBOX   = 'CHECKBOX';
    const TYPE_SELECT     = 'SELECT';
    const TYPE_SLIDER     = 'SLIDER';
    const TYPE_DATE       = 'DATE';
    const TYPE_TIME       = 'TIME';
    const TYPE_DATE_TIME  = 'DATE_TIME';
    const TYPE_DATE_RANGE = 'DATE_RANGE';

    public function getForeignKey(){
        return 'survey_id';
    }

    public function setOptions(array $options){
        return array_filter($options, function($option) {
            return isset($option['label'], $option['value']);
        });
    }

    public function setDynamicForm(array $attributes){
        $dynamic_forms   = $this->dynamic_forms ?? [];
        $dynamic_form    = [
            'label'          => $attributes['name'],
            'key'            => $attributes['key'] ?? null,
            'type'           => $attributes['type'],
            'component_name' => $attributes['component_name'] ?? null,
            'default_value'  => $attributes['default_value'] ?? [],
            'ordering'       => $attributes['ordering'] ?? 1,
            'attribute'      => $this->getDynamicAttribute($attributes['type'],$attributes['attribute'] ?? null),
            'rule'           => $attributes['rule'] ?? null,
            'options'        => $this->setOptions($attributes['options'] ?? []),
        ]; 
        $dynamic_forms[] = $dynamic_form;
        $this->setAttribute('dynamic_forms',$dynamic_forms);
    }

    public function getDynamicAttribute(string $type,? object $attribute = null){
        if (isset($attribute)) {
            $attribute = (array) $attribute;
            switch ($type) {
                case self::TYPE_INPUT       : return ['input_type' => $attribute['input_type'] ?? 'text','placeholder'=>$attribute['placeholder'] ?? null,'min'=>$attribute['min'] ?? null,'max'=>$attribute['max'] ?? null,'step'=>$attribute['step'] ?? null];break;
                // case self::TYPE_TOGGLE      : return null;break;
                case self::TYPE_TEXTAREA    : return ['rows' => $attribute['rows'] ?? 30,'maxlength' => $attribute['maxlength'] ?? null,'placeholder'=>$attribute['placeholder'] ?? null];break;
                // case self::TYPE_RADIO       : ;break;
                // case self::TYPE_CHECKBOX    : ;break;
                // case self::TYPE_SELECT      : ;break;
                case self::TYPE_SLIDER      : return ['min' => $attribute['min'] ?? null,'step' => $attribute['step'] ?? null,'max' => $attribute['max'] ?? null];break;
                case self::TYPE_DATE        : return ['date_type' => $attribute['date_type'] ?? 'daily','format' => $attribute['format'] ?? 'yyyy-MM-dd','min' => $attribute['min'] ?? null,'max' => $attribute['max'] ?? null];break;
                case self::TYPE_TIME        : return ['format' => $attribute['format'] ?? 'HH:mm','min' => $attribute['min'] ?? null,'max' => $attribute['max'] ?? null];break;
                case self::TYPE_DATE_TIME   : return ['format' => $attribute['format'] ?? 'yyyy-MM-dd HH:mm','min' => $attribute['min'] ?? null,'max' => $attribute['max'] ?? null];break;
                case self::TYPE_DATE_RANGE  : return ['format' => $attribute['format'] ?? 'yyyy-MM-dd','min' => $attribute['min'] ?? null,'max' => $attribute['max'] ?? null];break;
            }
        }
        return null;
    }

    public function setDynamicForms(array $attributes){
        $order = 1;
        foreach ($attributes as $attribute) {
            $has_ordering = isset($attribute['ordering']);
            $attribute['ordering'] ??= $order;
            $this->setDynamicForm($attribute);
            if ($has_ordering) $order = $attribute['ordering'];
            $order++;
        }
    }

    public function getViewResource(){
        return ViewSurvey::class;
    }

    public function getShowResource(){
        return ShowSurvey::class;
    }
}
