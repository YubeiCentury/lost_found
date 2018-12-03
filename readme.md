# 接口文档

## 接口使用

BaseURL : www.buhuiphp.com

使用请求头`Authorization`携带token`token {your token here}`访问接口

## 接口详情

## `/posts` 信息流相关

### POST `/posts/idcard/`  提交一卡通拾取表单

Quieries:

- `name_owner` 失主姓名
- `stuno` 失主学号
- `describe` 物品描述
- `file` 文件(jpeg/pjpeg/jpg/png)
- `name_pickup` 拾取人姓名
- `contactType` 联系类型
- `contact` 联系方式

Response(OK):

```json
    {
        "error":0,
        "msg":"success"
    }
```


### GET `/posts/idcard/`  获取表单信息

Quieries:

- `id` 表单唯一编号

Response(OK):

```json
    {
        "error":0,
        "msg":"success",
        "data":{
            "name_owner":"test",
            "stuno":"17051818",
            "describe":"\u63cf\u8ff0",
            "url":"http:\/\/phi28j82d.bkt.clouddn.com\/lost-found\/image\/test\/185DBD48799A57DC5125F5805BBE5F72.jpg",
            "name_pickup":"test",
            "contactType":"QQ",
            "contact":"contact",
            "timestamp":"1543818517"
        }
    }
```

#### 错误码表

错误码 | 说明
---|---
40501 | 未找到相应请求方式
40101 | 无效token
40001 | 图片大于5M
40002 | 图片类型错误
40003 | 图片url为空
50001 | 执行插入失败
50002 | 执行查询失败
103201 | id不存在

### POST `/posts/lost/`  提交一卡通拾取表单

Quieries:

- `name_pickup` 拾取者姓名
- `type` 拾取物品类型
- `describe` 物品描述
- `file` 文件(jpeg/pjpeg/jpg/png)
- `contactType` 联系类型
- `contact` 联系方式

Response(OK):

```json
    {
        "error":0,
        "msg":"success"
    }
```

### GET `/posts/idcard/`  获取表单信息

Quieries:

- `id` 表单唯一编号

Response(OK):

```json
    {"error":0,
    "msg":"success",
    "data":{
        "name_pickup":"test",
        "type":"type",
        "describe":"descripe",
        "url":"http:\/\/qiniu.yubei.online\/lost-found\/image\/test\/04ECE64FB4865C9A97854FF0F2D2B7A0.jpg",
        "contactType":"contactTyp",
        "contact":"contact",
        "timestamp":"1543822202"
        }
    }
```
#### 错误码表

错误码 | 说明
---|---
40502 | 未找到相应请求方式
40102 | 无效token
40004 | 图片大于5M
40005 | 图片类型错误
40006 | 图片url为空
50003 | 执行插入失败
50004 | 执行查询失败
103202 | id不存在


### POST `/posts/`  获取id列表

Quieries:

- `type` 表单类型：①`lost` ②`idcard`(一卡通拾取)

eg：`http://www.buhuiphp.com/posts/?type=lost`

Response(OK):

```json
    [
        {"id":"VDek4u"},
        {"id":"6ZirNF"},
        {"id":"fir1Gc"},
        {"id":"Kywi2O"},
        {"id":"z09n8p"},
        {"id":"PBLtJh"}
    ]
```

### POST `/posts/qq/`  获取跳转QQurl

Response(OK):

```json
    {
        "url":"www.buhuiphp.com\/inc\/openqq.php"
    }
```