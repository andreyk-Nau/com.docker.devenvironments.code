<?php

declare(strict_types=1);

namespace Shop;

final class Shop
{
    /**
     * @var Item[]
     */
    private $items;

    public function __construct(array $items)
    {
        $this->items = $items;
    }

    public function updateQuality(): void
    {
        foreach ($this->items as $item) {
            if ($item->name != 'Blue cheese' and $item->name != 'Concert tickets') {
                if ($item->quality > 0) {
                    if(strpos($item->name, 'Magic') !== false) {
                        if($item->quality == 1){
                            $item->quality = 0;
                        }else{
                            $item->quality -= 2;
                        }
                    }
                    elseif ($item->name != 'Mjolnir') {
                        $item->quality --;
                    }
                }
            } else {
                if ($item->quality < 50) {
                    $item->quality ++;
                    if ($item->name == 'Concert tickets') {
                        if ($item->sell_in < 11) {
                            if ($item->quality < 50) {
                                $item->quality ++;
                            }
                        }
                        if ($item->sell_in < 6) {
                            if ($item->quality < 50) {
                                $item->quality ++;
                            }
                        }
                    }
                }
            }

            if ($item->name != 'Mjolnir') {
                $item->sell_in --;
            }

            if ($item->sell_in < 0) {
                if ($item->name != 'Blue cheese') {
                    if ($item->name != 'Concert tickets') {
                        if ($item->quality > 0) {
                            if(strpos($item->name, 'Magic') !== false) {
                                if($item->quality == 1){
                                    $item->quality = 0;
                                }else{
                                    $item->quality -= 2;
                                }
                            }
                            elseif ($item->name != 'Mjolnir') {
                                $item->quality --;
                            }
                        }
                    } else {
                        $item->quality = 0;
                    }
                } else {
                    if ($item->quality < 50) {
                        $item->quality ++;
                    }
                }
            }
        }
    }
}
