<?php
class Maker extends AppModel {
    
    public function returnOptions() {
        $makers =  $this->find('all', [
            'fields' => [
                'id',
                'name'
            ]
        ]);
        $options = [];
        foreach ($makers as $maker) {
            $options[$maker['Maker']['id']] = $maker['Maker']['name'];
        }
        return $options;
    }
    
}

