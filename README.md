# simple_framework
simple_framework


 Redis是一个开源，先进的key-value存储，并用于构建高性能，可扩展的Web应用程序的完美解决方案。

Redis从它的许多竞争继承来的三个主要特点：

    Redis数据库完全在内存中，使用磁盘仅用于持久性。

    相比许多键值数据存储，Redis拥有一套较为丰富的数据类型。

    Redis可以将数据复制到任意数量的从服务器。

Redis 优势

    异常快速：Redis的速度非常快，每秒能执行约11万集合，每秒约81000+条记录。

    支持丰富的数据类型：Redis支持最大多数开发人员已经知道像列表，集合，有序集合，散列数据类型。这使得它非常容易解决各种各样的问题，因为我们知道哪些问题是可以处理通过它的数据类型更好。

    操作都是原子性：所有Redis操作是原子的，这保证了如果两个客户端同时访问的Redis服务器将获得更新后的值。

    多功能实用工具：Redis是一个多实用的工具，可以在多个用例如缓存，消息，队列使用(Redis原生支持发布/订阅)，任何短暂的数据，应用程序，如Web应用程序会话，网页命中计数等。

Redis - 环境

Ubuntu上安装Redis，打开终端，然后键入以下命令：

$sudo apt-get update $sudo apt-get install redis-server 

这将在您的计算机上安装Redis。

启动 Redis

$redis-server 

检查Redis是否在工作？

$redis-cli 

这将打开一个Redis提示，如下图所示：

redis 127.0.0.1:6379> 

上面的提示127.0.0.1是本机的IP地址，6379为Redis服务器运行的端口。现在输入PING命令，如下图所示。

redis 127.0.0.1:6379> ping PONG 

这说明你已经成功地安装Redis在您的机器上。
在Ubuntu上安装Redis的桌面管理器

在Ubuntu上安装Redis的桌面管理器，只需从 http://redisdesktop.com/download 打开下载软件包并安装它。

Redis桌面管理器会给你用户界面来管理Redis的Key和数据。
Redis - 数据类型

Redis支持5种类型的数据类型，它描述如下的：
字符串

Redis字符串是字节序列。Redis字符串是二进制安全的，这意味着他们有一个已知的长度没有任何特殊字符终止，所以你可以存储任何东西，512兆为上限。
例子

redis 127.0.0.1:6379> SET name "yiibai" OK redis 127.0.0.1:6379> GET name "yiibai" 

上面是Redis的set和get命令的例子，Redis名称为yiibai使用的key存储在Redis的字符串值。
哈希

Redis的哈希是键值对的集合。 Redis的哈希值是字符串字段和字符串值之间的映射，因此它们被用来表示对象
例子

redis 127.0.0.1:6379> HMSET user:1 username yiibai password yiibai points 200 OK redis 127.0.0.1:6379> HGETALL user:1  1) "username"
2) "yiibai"
3) "password"
4) "yiibai"
5) "points"
6) "200"  

在上面的例子中的哈希数据类型，用于存储其中包含的用户的基本信息用户的对象。这里HMSET，HEGTALL用户命令user:1是键。
列表

Redis的列表是简单的字符串列表，排序插入顺序。您可以添加元素到Redis的列表的头部或尾部。
例子

redis 127.0.0.1:6379> lpush tutoriallist redis (integer) 1 redis 127.0.0.1:6379> lpush tutoriallist mongodb (integer) 2 redis 127.0.0.1:6379> lpush tutoriallist rabitmq (integer) 3 redis 127.0.0.1:6379> lrange tutoriallist 0 10  1) "rabitmq"
2) "mongodb"
3) "redis"  

列表的最大长度为 232 - 1 元素（4294967295，每个列表中可容纳超过4十亿的元素）。
集合

Redis的集合是字符串的无序集合。在Redis您可以添加，删除和测试文件是否存在，在成员O（1）的时间复杂度。
例子

redis 127.0.0.1:6379> sadd tutoriallist redis (integer) 1 redis 127.0.0.1:6379> sadd tutoriallist mongodb (integer) 1 redis 127.0.0.1:6379> sadd tutoriallist rabitmq (integer) 1 redis 127.0.0.1:6379> sadd tutoriallist rabitmq (integer) 0 redis 127.0.0.1:6379> smembers tutoriallist  1) "rabitmq"
2) "mongodb"
3) "redis"  

注意：在上面的例子中rabitmq集合添加加两次，但由于集合元素具有唯一属性。

集合中的元素最大数量为 232 - 1 （4294967295，可容纳超过4十亿元素）。
有序集合

Redis的有序集合类似于Redis的集合，字符串不重复的集合。不同的是，一个有序集合的每个成员用分数，以便采取有序set命令，从最小的到最大的成员分数有关。虽然成员具有唯一性，但分数可能会重复。
例子

redis 127.0.0.1:6379> zadd tutoriallist 0 redis (integer) 1 redis 127.0.0.1:6379> zadd tutoriallist 0 mongodb (integer) 1 redis 127.0.0.1:6379> zadd tutoriallist 0 rabitmq (integer) 1 redis 127.0.0.1:6379> zadd tutoriallist 0 rabitmq (integer) 0 redis 127.0.0.1:6379> ZRANGEBYSCORE tutoriallist 0 1000  1) "redis"
2) "mongodb"
3) "rabitmq"  

Redis - keys

Redis keys命令用于在Redis的管理键。Redis keys命令使用语法如下所示：
语法

redis 127.0.0.1:6379> COMMAND KEY_NAME 

例子

redis 127.0.0.1:6379> SET yiibai redis OK redis 127.0.0.1:6379> DEL yiibai (integer) 1 

在上面的例子中DEL是命令，而yiibai是key。如果key被删除，那么输出该命令将是（整数）1，否则它会是（整数）0
Redis - Strings

Redis strings命令用于在Redis的管理字符串值。Redis strings命令的使用语法，如下所示：
语法

redis 127.0.0.1:6379> COMMAND KEY_NAME 

例子

redis 127.0.0.1:6379> SET yiibai redis OK redis 127.0.0.1:6379> GET yiibai "redis" 

在上面的例子SET和GET是命令，而yiibai是key。
Redis - 哈希

Redis的哈希值是字符串字段和字符串值之间的映射，所以他们是代表对象的完美数据类型

在Redis的哈希值，最多可存储超过40多亿字段 - 值对。
例子

redis 127.0.0.1:6379> HMSET yiibai name "redis tutorial" description "redis basic commands for caching" likes 20 visitors 23000 OK redis 127.0.0.1:6379> HGETALL yiibai  1) "name"
2) "redis tutorial"
3) "description"
4) "redis basic commands for caching"
5) "likes"
6) "20"
7) "visitors"
8) "23000"  

在上面的例子中，已经在哈希命名yiibai的Redis集合名为tutorials（name, description, likes, visitors）
Redis - 列表

Redis的列表是简单的字符串列表，排序插入顺序。您可以添加Redis元素在列表头部或列表的尾部。

列表的最大长度为 232 - 1 个元素（每个列表元素个数超过4294967295）。
例子

redis 127.0.0.1:6379> LPUSH tutorials redis (integer) 1 redis 127.0.0.1:6379> LPUSH tutorials mongodb (integer) 2 redis 127.0.0.1:6379> LPUSH tutorials mysql (integer) 3 redis 127.0.0.1:6379> LRANGE tutorials 0 10  1) "mysql"
2) "mongodb"
3) "redis"  

在上述例子中的三个值被插入在redis列表名为LPUSH的命令教程。
Redis - 集合

Redis的集合是唯一的字符串的无序集合。集合的唯一性不允许数据的重复的键。

在Redis的集合添加，删除和测试文件是否存在成员在O（1）（常数时间不管里面包含的元素集合的数量）。集合的最大长度为 232 - 1 个元素（每集合超过4294967295元素）。
例子

redis 127.0.0.1:6379> SADD tutorials redis (integer) 1 redis 127.0.0.1:6379> SADD tutorials mongodb (integer) 1 redis 127.0.0.1:6379> SADD tutorials mysql (integer) 1 redis 127.0.0.1:6379> SADD tutorials mysql (integer) 0 redis 127.0.0.1:6379> SMEMBERS tutorials  1) "mysql"
2) "mongodb"
3) "redis"  

在上述例子中的三个值被命令SADD插入redis的集合名称tutorials。
Redis有序集

Redis的有序集合类似Redis的集合存储在设定值具有唯一性。不同的是，一个有序集合的每个成员用分数，以便采取有序set命令，从最小的到最大的分数有关。

在Redis的有序set添加，删除和测试存在成员O（1）（固定时间，无论里面包含集合元素的数量）。列表的最大长度为 232 - 1 个元素（每集合超过4294967295元素）。
例子

redis 127.0.0.1:6379> ZADD tutorials 1 redis (integer) 1 redis 127.0.0.1:6379> ZADD tutorials 2 mongodb (integer) 1 redis 127.0.0.1:6379> ZADD tutorials 3 mysql (integer) 1 redis 127.0.0.1:6379> ZADD tutorials 3 mysql (integer) 0 redis 127.0.0.1:6379> ZADD tutorials 4 mysql (integer) 0 redis 127.0.0.1:6379> ZRANGE tutorials 0 10 WITHSCORES  1) "redis"
2) "1"
3) "mongodb"
4) "2"
5) "mysql"
6) "4"  

在上述例子中的三个值被命令ZADD插入其得分在redis的有序集命名为tutorials。
Redis - HyperLogLog

Redis的HyperLogLog使用随机化，以提供唯一的元素数目近似的集合只使用一个常数，并且体积小，少量内存的算法。

HyperLogLog提供，即使每个使用了非常少量的内存（12千字节），标准误差为集合的基数非常近似，没有限制的条目数，可以指定，除非接近 264个条目。
例子

下面的示例说明Redis的HyperLogLog工作原理：

redis 127.0.0.1:6379> PFADD tutorials "redis"  1) (integer) 1  redis 127.0.0.1:6379> PFADD tutorials "mongodb"  1) (integer) 1  redis 127.0.0.1:6379> PFADD tutorials "mysql"  1) (integer) 1  redis 127.0.0.1:6379> PFCOUNT tutorials  (integer) 3  

Redis - 订阅

Redis的订阅实现了邮件系统，发送者（在Redis的术语中被称为发布者）发送的邮件，而接收器（用户）接收它们。由该消息传送的链路被称为通道。

在Redis客户端可以订阅任何数目的通道。
示例

以下举例说明如何发布用户的概念工作。在下面的例子给出一个客户端订阅一个通道名为redisChat

redis 127.0.0.1:6379> SUBSCRIBE redisChat  Reading messages... (press Ctrl-C to quit)
1) "subscribe"
2) "redisChat"
3) (integer) 1  

现在，两个客户端都发布在同一个命名通道redisChat消息，并且以上订阅客户端接收消息。

redis 127.0.0.1:6379> PUBLISH redisChat "Redis is a great caching technique"  (integer) 1  redis 127.0.0.1:6379> PUBLISH redisChat "Learn redis by tutorials point"  (integer) 1   1) "message"
2) "redisChat"
3) "Redis is a great caching technique"
1) "message"
2) "redisChat"
3) "Learn redis by tutorials point"  

Redis - 事务

Redis事务让一组命令在单个步骤执行。事务中有两个属性，说明如下：

    在一个事务中的所有命令按顺序执行作为单个隔离操作。通过另一个客户端发出的请求在Redis的事务的过程中执行，这是不可能的。

    Redis的事务具有原子性。原子意味着要么所有的命令都执行或都不执行。

例子

Redis的事务由指令多重发起，然后需要传递在事务，而且整个事务是通过执行命令EXEC执行命令列表。

redis 127.0.0.1:6379> MULTI OK List of commands here redis 127.0.0.1:6379> EXEC 

例子

以下举例说明Redis事务如何启动并执行。

redis 127.0.0.1:6379> MULTI OK redis 127.0.0.1:6379> SET tutorial redis QUEUED redis 127.0.0.1:6379> GET tutorial QUEUED redis 127.0.0.1:6379> INCR visitors QUEUED redis 127.0.0.1:6379> EXEC  1) OK
2) "redis"
3) (integer) 1  

Redis - 脚本

Redis脚本使用Lua解释脚本用于评估计算。它内置的Redis，从2.6.0版本开始使用脚本命令 eval。
语法

eval命令的基本语法如下：

redis 127.0.0.1:6379> EVAL script numkeys key [key ...] arg [arg ...] 

例子

以下举例说明Redis脚本的工作原理：

redis 127.0.0.1:6379> EVAL "return {KEYS[1],KEYS[2],ARGV[1],ARGV[2]}" 2 key1 key2 first second  1) "key1"
2) "key2"
3) "first"
4) "second"  

Redis - 连接

Redis的连接命令基本上都是用于管理与Redis的服务器客户端连接。
Example

下面的例子说明了一个客户如何通过Redis服务器验证自己，并检查服务器是否正在运行。

redis 127.0.0.1:6379> AUTH "password" OK redis 127.0.0.1:6379> PING PONG 

Redis - 备份

Redis SAVE命令用来创建当前的 Redis 数据库备份。
语法

对Redis SAVE命令的基本语法如下所示：

127.0.0.1:6379> SAVE 

例子

下面的示例显示了 Redis 当前数据库如何创建备份。

127.0.0.1:6379> SAVE  OK  

这个命令将创建dump.rdb文件在Redis目录中。
还原Redis数据

要恢复Redis的数据只需移动 Redis 的备份文件（dump.rdb）到 Redis 目录，然后启动服务器。为了得到你的 Redis 目录，使用配置命令如下所示：

127.0.0.1:6379> CONFIG get dir  1) "dir"
2) "/user/yiibai/redis-2.8.13/src"  

在上述命令的输出在 /user/yiibai/redis-2.8.13/src 目录，在安装redis的服务器安装位置。
Bgsave

要创建Redis的备份备用命令BGSAVE也可以。这个命令将开始执行备份过程，并在后台运行。
例子

127.0.0.1:6379> BGSAVE  Background saving started  

Redis - 安全

可以Redis的数据库更安全，所以相关的任何客户端都需要在执行命令之前进行身份验证。客户端输入密码匹配需要使用Redis设置在配置文件中的密码。
例子

下面给出的例子显示的步骤，以确保您的Redis实例安全。

127.0.0.1:6379> CONFIG get requirepass 1) "requirepass"
2) "" 

默认情况下，此属性为空，表示没有设置密码，此实例。您可以通过执行以下命令来更改这个属性

127.0.0.1:6379> CONFIG set requirepass "yiibai" OK 127.0.0.1:6379> CONFIG get requirepass 1) "requirepass"
2) "yiibai" 

设置密码，如果客户端运行命令没有验证，会提示（错误）NOAUTH，需要通过验证。错误将返回客户端。因此，客户端需要使用AUTHcommand进行认证。
语法

AUTH命令的基本语法如下所示：

127.0.0.1:6379> AUTH password 

Redis - 基准

Redis基准是公用工具同时运行Ñ命令检查Redis的性能。
语法

redis的基准的基本语法如下所示：

redis-benchmark [option] [option value] 

例子

下面给出的例子检查redis调用100000命令。

redis-benchmark -n 100000  PING_INLINE: 141043.72 requests per second
PING_BULK: 142857.14 requests per second
SET: 141442.72 requests per second
GET: 145348.83 requests per second
INCR: 137362.64 requests per second
LPUSH: 145348.83 requests per second
LPOP: 146198.83 requests per second
SADD: 146198.83 requests per second
SPOP: 149253.73 requests per second
LPUSH (needed to benchmark LRANGE): 148588.42 requests per second
LRANGE_100 (first 100 elements): 58411.21 requests per second
LRANGE_300 (first 300 elements): 21195.42 requests per second
LRANGE_500 (first 450 elements): 14539.11 requests per second
LRANGE_600 (first 600 elements): 10504.20 requests per second
MSET (10 keys): 93283.58 requests per second  

Redis - 客户端连接

Redis接受配置监听TCP端口和Unix套接字客户端的连接，如果启用。当一个新的客户端连接被接受以下操作进行：

    客户端套接字置于非阻塞状态，因为Redis使用复用和非阻塞I/O操作。

    TCP_NODELAY选项设定是为了确保我们没有在连接时延迟。

    创建一个可读的文件时，这样Redis能够尽快收集客户端的查询作为新的数据可供读取的套接字。

客户端的最大数量

在Redis的配置（redis.conf）属性调用maxclients，它描述客户端可以连接到Redis的最大数量。命令的基本语法是：

config get maxclients  1) "maxclients"
2) "10000"  

默认情况下，此属性设置为10000（这取决于操作系统的文件描述符限制最大数量），但你可以改变这个属性。
例子

在下面给出的例子中，在启动服务器我们设置客户端的最大数量为10万。

redis-server --maxclients 100000 

Redis - 管道传输

Redis是一个TCP服务器，并支持请求/响应协议。在redis一个请求完成下面的步骤：

    客户端发送一个查询到服务器，并从套接字中读取，通常在阻塞的方式，对服务器的响应。

    服务器处理命令并将响应返回给客户端。

管道传输的含义

管道的基本含义是，客户端可以发送多个请求给服务器，而无需等待答复所有，并最后读取在单个步骤中的答复。
例子

要检查redis的管道，只要启动Redis实例，然后在终端键入以下命令。

$(echo -en "PING\r\n SET tutorial redis\r\nGET tutorial\r\nINCR visitor\r\nINCR visitor\r\nINCR visitor\r\n"; sleep 10) | nc localhost 6379  +PONG
+OK
redis
:1
:2
:3  

在上述例子中，我们必须使用PING命令检查Redis的连接，之后，我们已经设定值的Redis字符串命名tutorial ，之后拿到key的值和增量访问量的三倍。在结果中，我们可以检查所有的命令都一次提交给Redis，Redis是在一个步骤给出所有命令的输出。
管道的好处

这种技术的好处是极大地改善协议的性能。通过管道将慢互联网连接速度从5倍的连接速度提高到localhost至少达到百过倍。
Redis - 分区

分区是一种将数据分成多个Redis的情况下，让每一个实例将只包含你的键字的子集的过程。
分区的好处

    它允许更大的数据库，使用的多台计算机的存储器的总和。如果不分区，一台计算机的内存可支数量有限。

    它允许以大规模的计算能力，以多个内核和多个计算机，以及网络带宽向多台计算机和网络适配器。

分区的缺点

    通常不支持涉及多个键的操作。例如，不能两个集合之间执行交叉点，因为它们存储在被映射到不同Redis实例中的键。

    涉及多个键的Redis事务不能被使用。

    分区粒度是关键，所以它是不可能分片数据集用一个硕大的键是一个非常大的有序集合。

    当分区时，数据处理比较复杂，比如要处理多个RDB/AOF文件，使数据备份需要从多个实例和主机聚集持久性文件。

    添加和删除的能力可能很复杂。比如Redis的集群支持有添加，并在运行时删除节点不支持此功能的能力，但其他系统，如客户端的分区和代理的数据大多是透明的重新平衡。但是有一个叫Presharding技术有助于在这方面。

分区的类型

redis的提供有两种类型的分区。假设我们有四个Redis实例R0，R1，R2，R3和代表用户很多键如：user:1, user:2, ... 等等
范围分区

范围分区被映射对象转化为具体的Redis实例的范围内实现。假定在本例中用户ID0〜ID10000将进入实例R0，而用户形成ID10001至20000号将进入实例R1等等。
散列分区

在这种类型的分区，一个散列函数（例如，模数函数）被用于转换键成数字，然后数据被存储在不同redis的实例。 