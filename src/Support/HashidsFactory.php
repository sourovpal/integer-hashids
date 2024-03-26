<?php

/*
 * This file is part of Laravel Hashids.
 *
 * (c) Vincent Klaiber <hello@vinkla.com>
 * Adapted by Maru Amallo (amamarul) <ama_marul@hotmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Amamarul\Hashids\Support;

use Amamarul\Hashids\Support\Hashids\Hashids;
use Illuminate\Support\Arr;

/**
 * This is the Hashids factory class.
 *
 * @author Vincent Klaiber <hello@vinkla.com>
 */
class HashidsFactory
{
    /**
     * Make a new Hashids client.
     *
     * @param array $config
     *
     * @return \Hashids\Hashids
     */
    public function make(array $config)
    {
        $config = $this->getConfig($config);

        return $this->getClient($config);
    }

    /**
     * Get the configuration data.
     *
     * @param array $config
     *
     * @throws \InvalidArgumentException
     *
     * @return array
     */
    protected function getConfig(array $config)
    {
        return [
            'salt' => Arr::get($config, 'salt', ''),
            'length' => Arr::get($config, 'length', 0),
            'alphabet' => Arr::get($config, 'alphabet', ''),
            'prefix' => Arr::get($config, 'prefix', null),
        ];
    }

    /**
     * Get the hashids client.
     *
     * @param array $config
     *
     * @return \Hashids\Hashids
     */
    protected function getClient(array $config)
    {
        return new Hashids($config['salt'], $config['length'], $config['alphabet'], $config['prefix']);
    }
}
