<?php


namespace Buoly\MeituanTakeaway\Api;


class Poi extends Api
{
    /**
     * 创建或更新门店信息
     */
    public function save(array $params)
    {
        return $this->post('poi/save', $params);
    }
    /**
     * 获取门店ID
     */
    public function getids(array $params)
    {
        return $this->get('poi/getids', $params);
    }
    /**
     * 批量获取门店详细信息
     */
    public function mget(array $params)
    {
        return $this->get('poi/mget', $params);
    }
    /**
     * 门店设置为营业状态
     */
    public function open(array $params)
    {
        return $this->post('poi/open', $params);
    }
    /**
     * 门店设置为休息状态
     */
    public function close(array $params)
    {
        return $this->post('poi/close', $params);
    }
    /**
     * 门店设置为下线状态
     */
    public function offline(array $params)
    {
        return $this->post('poi/offline', $params);
    }
    /**
     * 门店设置为上线状态
     */
    public function online(array $params)
    {
        return $this->post('poi/online', $params);
    }
    /**
     * 更改门店公告信息
     */
    public function updatepromoteinfo(array $params)
    {
        return $this->post('poi/updatepromoteinfo', $params);
    }
    /**
     * 获取门店品类列表
     */
    public function tagList(array $params)
    {
        return $this->post('poiTag/list', $params);
    }
    /**
     * 更新门店营业时间
     */
    public function shippingtimeUpdate(array $params)
    {
        return $this->post('shippingtime/update', $params);
    }
    /**
     * 查询门店是否延迟发配送
     */
    public function isDelayPush(array $params)
    {
        return $this->post('poi/logistics/isDelayPush', $params);
    }
    /**
     * 设置门店延迟发配送时间
     */
    public function setDelayPush(array $params)
    {
        return $this->post('poi/logistics/setDelayPush', $params);
    }
}