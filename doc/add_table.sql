create table oc_customer_token(
	`id` int(10) auto_increment,
	`uid` int(10) not null default 0 comment '用户id',
	`token` char(32) not null default '' comment 'token',
	`etime` int(10) not null default 0 comment '过期时间',
	`ctime`	timestamp not null default current_timestamp comment '生成时间',

	primary key (`id`),
	key (`token`)
)engine = innoDB default charset = utf8;