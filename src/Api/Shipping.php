<?php


namespace Buoly\MeituanTakeaway\Api;


class Shipping extends Api
{
     
    /**
     * 创建或更新门店配送范围
     */
    public function save(array $params)
    {
        return $this->post('shipping/save', $params);
    }
     
    /**
     * 获取门店配送范围自配送
     */
    public function list(array $params)
    {
        return $this->get('shipping/list', $params);
    }
     
    /**
     * 批量创建或更新配送范围
     */
    public function batchsave(array $params)
    {
        return $this->post('shipping/batchsave', $params);
    }
     
    /**
     * 获取门店配送范围混合送
     */
    public function fetch(array $params)
    {
        return $this->get('shipping/fetch', $params);
    }
     
    /**
     * 删除配送范围
     */
    public function delete(array $params)
    {
        return $this->post('shipping/delete', $params);
    }
     
    /**
     * 新增或更新特殊时段配送范围
     */
    public function specSave(array $params)
    {
        return $this->post('shipping/spec/save', $params);
    }
}