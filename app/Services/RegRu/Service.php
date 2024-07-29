<?php

namespace App\Services\RegRu;

use Exception;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;

/*
 * Функции для работы с услугами
 * //service/nop Проверка доступности списка услуг
 * //service/get_prices (получение цен на активацию/продление услуг)
 * //service/get_servtype_details (получить цену и общие данные услуги)
 * //service/create (заказ новой услуги)
 * //service/check_create (валидация параметров заказа новой услуги)
 * //service/delete (удаление услуги)
 * //service/get_info (получить информацию об услугах)
 * //service/get_list (получить список активных услуг)
 * //service/get_folders (получение списка папок, в которые входит сервис)
 * //service/get_details (получение общей информации по услуге)
 * //service/get_dedicated_server_list (получение списка выделенных серверов доступных для заказа)
 * //service/update (настройка услуги)
 * //service/renew (продление домена или услуги)
 * //service/get_bills (получить список счетов, связанных с услугами)
 * //service/check_readonly
 * //service/set_autorenew_flag (управление флагом автопродления)
 * //service/suspend (приостановить действие услуги)
 * //service/resume (возобновить действие услуги)
 * //service/get_depreciated_period (число периодов до даты истечения услуги)
 * //service/upgrade (повышение тарифа услуги)
 * //service/partcontrol_grant (передать услугу в частичное управление)
 * //service/partcontrol_revoke (отозвать права частичного управления)
 * //service/resend_mail (повторить email сообщение)
 * //service/refill (пополнить счет услуги)
 * //service/refund (вывести средства со счета внешней услуги на счет аккаунта reg.ru)
 * //service/get_balance (получить баланс внешней услуги)
 * //service/seowizard_manage_link (получить ссылку на панель управления Seowizard'ом)
 * //service/get_websitebuilder_link (получить ссылку на публикацию конструктора Reg.ru)
 */
class Service
{
    protected string $username;
    protected string $password;

    /**
     * @throws Exception
     */
    public function __construct()
    {
        if ($account = config('reg_ru.default')) {
            $this->account($account);
        }
    }

    /**
     * @param string $account
     *
     * @throws Exception
     */
    public function account(string $account): void
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
    }

    /**
     * @param string $account
     * @param array $config
     *
     * @return bool
     */
    private function accountCheck(string $account, array $config): bool
    {
        return !isset($config[$account]['username']) || !isset($config[$account]['password']);
    }

    /**
     * @param string $cmd
     * @param array $params
     * @param string $format
     * @return string
     * @throws GuzzleException
     * @throws Exception
     */
    public function send(string $cmd = 'nop', array $params = [], string $format = 'plain')
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
            'form_params' => $this->prepare($params),
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
