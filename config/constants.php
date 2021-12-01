<?php
if(!defined('ACTIVE_STATUS')) define('ACTIVE_STATUS', '1');
if(!defined('PRDOCUT_IMAGE_TYPE')) define('PRDOCUT_IMAGE_TYPE', 'I');
if(!defined('PRDOCUT_VIDEO_TYPE')) define('PRDOCUT_VIDEO_TYPE', 'V');
if(!defined('COMMON_ERROR')) define('COMMON_ERROR', 'Something went wrong, please try again later!');

defined('ORDER_PENDING') OR define('ORDER_PENDING', 0);
defined('ORDER_PROCESS') OR define('ORDER_PROCESS', 1);
defined('ORDER_ON_DELIVERY') OR define('ORDER_ON_DELIVERY', 2);
defined('ORDER_COMPLETED') OR define('ORDER_COMPLETED', 3);
defined('ORDER_DECLINED') OR define('ORDER_DECLINED', 4);

defined('LOGOUT') OR define('LOGOUT', 0);
defined('LOGIN') OR define('LOGIN', 1);

//UNSUBSCRIBED/ SUBSCRIBED STATUS
defined('SUBSCRIBED') OR define('SUBSCRIBED', 1);
defined('UNSUBSCRIBED') OR define('UNSUBSCRIBED', 0);

defined('IN_ACTIVE') OR define('IN_ACTIVE', 0);
defined('DRAFT') OR define('DRAFT', 1);
defined('PUBLISHED') OR define('PUBLISHED', 2);


defined('ADMIN') OR define('ADMIN', 1);
defined('SELLER') OR define('SELLER', 3);
defined('BUYER') OR define('BUYER', 4);


defined('SELLER_GIVE_OFFER') OR define('SELLER_GIVE_OFFER', 1);
defined('BUYER_USED_OFFER') OR define('BUYER_USED_OFFER', 2);