<?php

namespace Hanafalah\ModuleExamination\Models\Form;

use Hanafalah\ModuleExamination\Resources\Survey\{ViewSurvey,ShowSurvey};

class Survey extends Form
{
    protected $table = 'unicodes';

    const TYPE_INPUT_TEXT    = 'InputText';
    const TYPE_INPUT_NUMBER  = 'InputNumber';
    const TYPE_INPUT_OTP     = 'InputOtp';
    const TYPE_TEXT_EDITOR   = 'TextEditor';
    const TYPE_TEXTAREA      = 'Textarea';
    const TYPE_CHECKBOX      = 'Checkbox';
    const TYPE_RADIO_BUTTON  = 'RadioButton';
    const TYPE_SELECT        = 'Select';
    const TYPE_SELECT_BUTTON = 'SelectButton';
    const TYPE_MULTI_SELECT  = 'MultiSelect';
    const TYPE_SLIDER        = 'Slider';
    const TYPE_TOGGLE_BUTTON = 'ToggleButton';
    const TYPE_TOGGLE_SWITCH = 'ToggleSwitch';
    const TYPE_DATE_PICKER   = 'DatePicker';
    const TYPE_DATE_TIME_PICKER  = 'DateTimePicker';
    const TYPE_MONTH_PICKER      = 'MonthPicker';
    const TYPE_TIME_PICKER       = 'TimePicker';
    const TYPE_DATE_RANGE_PICKER = 'DateRangePicker';

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
            $component_attribute = config('module-examination.survey.dynamic_form.component');
            if (isset($component_attribute[$type])){
                if (isset($component_attribute[$type])){
                    $fixed_attributes = $component_attribute[$type];
                    foreach ($fixed_attributes as $key => $value) {
                        if (!is_array($value) && isset($value[$attribute['key']])) $attribute[$key] = $attribute[$key] ?? $value;
                    }
                }
            }else{
                return [];
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
