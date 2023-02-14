<?php

class Computer
{
    public ?string $model = null;
    public ?string $operating_system = null;
    public bool $is_portable = false;
    public ?string $status  = 'off';

    public function switchOff() :void
    {
        $this->status = 'off';
    }
    public function toggleSwitch() :void
    { 
        $this->status = $this->status ==='on' ? 'off':'on';

        // same as:
        // if ($this->status === 'off'){
        //     $this->status = 'on';
        // } else ($this->status ==='on'){
        //     $this->status = 'off';
        // }
    }
}
//bad place for executable code