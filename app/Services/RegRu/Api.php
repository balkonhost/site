<?php

namespace App\Services\RegRu;

use Exception;
use GuzzleHttp\Client;

class Api
{
    protected string $username;

    protected string $password;

    public function __construct()
    {
        if ($account = config('reg_ru.default')) {
            $this->account($account);
        }
    }

    /**
     * @param string $server
     *
     * @throws Exception
     *
     * @return $this
     */
    public function account($account)
    {
        if (empty($account)) {
            throw new Exception('Account is not specified');
        }

        $allAccounts = config('reg_ru.accounts');

        if (!isset($allAccounts[$account])) {
            throw new Exception('Specified account not found in config');
        }

        if ($this->accountCheck($account, $allAccounts)) {
            throw new Exception('Specified server config does not contain host or key');
        }

        $this->username = (string) $allAccounts[$account]['username'];
        $this->password = (string) $allAccounts[$account]['password'];

        return $this;
    }

    /**
     * @param string $account
     * @param array  $config
     *
     * @return bool
     */
    private function accountCheck($account, $config)
    {
        return !isset($config[$account]['username']) || !isset($config[$account]['password']);
    }

    /**
     * @param string $cmd
     *
     * @throws Exception
     *
     * @return string
     */
    public function send($cmd = 'nop', $params = [], $format = 'plain')
    {
        $config = config('reg_ru.client');

        if (!isset($config)) {
            throw new Exception('Specified client params not found in config');
        }

        $client = new Client($config);

        $params = array_merge($params, [
            'username' => $this->username,
            'password' => $this->password
        ]);

        if ('json' === $format) {
            $params = [
                'input_data' => json_encode($params),
                'input_format' => 'json'
            ];
        }

        $json = $client->post($cmd, [
            'form_params' => $params,
            //'timeout' => 60,
            //'connect_timeout' => 60
        ])
            ->getBody()
            ->getContents();

        if (!$data = json_decode($json, true)) {
            throw new Exception('JSON decoding error');
        }

        if (!isset($data['result'])) {
            throw new Exception('The answer does not contain the result');
        }

        if ('error' === $data['result']) {
            throw new Exception("{$data['error_code']}: {$data['error_text']}");
        }

        return $data['answer'] ?? $data['result'];
    }
}
