<?php


namespace Buoly\MeituanTakeaway\Api;


class Comment extends Api
{
    /**
     * 根据门店id批量查询评价信息
     */
    public function commentQuery(array $params)
    {
        return $this->get('comment/query', $params);
    }

    /**
     * 根据评价id添加商家回复
     */
    public function poiCommentAddReply(array $params)
    {
        return $this->post('poi/comment/add_reply', $params);
    }

    /**
     * 通过门店ID获取当前门店评分
     */
    public function commentScore(array $params)
    {
        return $this->get('comment/score', $params);
    }
}