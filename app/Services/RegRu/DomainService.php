<?php

namespace App\Services\RegRu;

/*
 * Не реализованные функции для работы с доменами
 * //domain/get_suggest (подбор имени для домена по ключевым словам)
 * //domain/get_premium_prices
 * //domain/get_deleted (список освобождённых доменов)
 * //domain/check (проверка занятости домена)
 * //domain/create (заявка на регистрацию домена)
 * //domain/transfer (заявка на перенос домена)
 * //domain/get_transfer_status
 * //domain/set_new_authinfo
 * //domain/get_rereg_data (список освобождающихся доменов с характеристиками)
 * //domain/set_rereg_bids (сделать ставки на освобождающиеся домены)
 * //domain/get_user_rereg_bids (список освобождающихся доменов со своими ставками)
 * //domain/get_docs_upload_uri (получение ссылки на закачивание документов)
 * //domain/update_contacts (изменение контактных данных домена)
 * //domain/update_private_person_flag (изменение флага скрытия/отображения контактных данных в whois)
 * //domain/register_ns (внесение домена в NSI-registry)
 * //domain/delete_ns (удаление домена из NSI-registry)
 * //domain/get_nss (получение списка DNS для доменов)
 * //domain/update_nss (изменение DNS серверов домена)
 * //domain/delegate (делегирование домена)
 * //domain/undelegate (снятие делегирования домена)
 * //domain/transfer_to_another_account (передача домена на другой аккаунт)
 * //domain/look_at_entering_list (просмотр передаваемых на аккаунт доменов)
 * //domain/accept_or_refuse_entering_list (принять или отклонить передаваемые на аккаунт домены)
 * //domain/request_to_transfer (отправить заявку на перенос доменов на свой аккаунт)
 * //domain/get_tld_info
 * //domain/send_email_verification_letter
 */

use App\Services\RegRu\Api\success;

class DomainService extends Service
{
    /**
     * Для тестирования. Также позволяет проверить доступность домена и получить его id, если передать dname
     * @function domain/nop
     *
     * @param array $params Поля запроса:
     * отсутствуют или стандартные параметры идентификации доменов
     *
     * @return false|success|array
     */
    public function nop(array $params = [])
    {
        return $this->send('domain/nop', $params);
    }

    /**
     *  Получить цены на все доменные зоны
     * @function domain/get_prices
     *
     * @param array $params Поля запроса:
     * show_renew_data - флаг возврата цен для продления регистрации (1/0). Необязательное поле.
     * show_update_data - флаг возврата цен для обновления домена (1/0). Необязательное поле.
     * currency - идентификатор валюты, в которой будут возвращаться цены (RUR, UAH, USD, EUR). Необязательное поле, по умолчанию цены указываются в рублях.
     *
     * @return false|array
     */
    public function getPrices(array $params = [])
    {
        return $this->send('domain/get_prices', $params);
    }

    /**
     * Получить информацию по доступным доменным именам
     *
     * @return false|array
     */
    public function getDomains()
    {
        return $this->getList(['servtype' => 'domain']);
    }
}
