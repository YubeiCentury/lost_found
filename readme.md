# 接口文档

## 接口使用

BaseURL : localhost

使用请求头`Authorization`携带token`token {your token here}`访问接口

## 接口详情


## `/user` 登录相关

### GET `/user/login/`  获取学号登录链接

Quieries:

- `redirect` app回调地址，用于接受AccessToken的地址，需要http/https前缀
- `clientId` 设备id

Response(OK):

`url`就是登录链接

注意:**返回url中的所有`&`被替换成了`\u0026`，需要前端进行一次字符串替换，不然学校接口会报错**

```json
{
    "error":0,
    "msg":"get url success",
    "url":"url"
}
```
用户登录完成之后会跳转到`{redirect}?auth={token}`地址，如：

如`redirect`为`https%3a%2f%2fwww.baidu.com`时，登录成功后跳转`https://www.baidu.com/?auth=LrIH9YEaUy9pmg6nLlpatVvPaxtNuRgQPDT`,其中`LrIH9YEaUy9pmg6nLlpatVvPaxtNuRgQPDT`就是用户token，有效期6个月

之后的请求携带该token即可


## `/posts` 信息流相关

### POST `/idcard/`  提交一卡通拾取表单

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


### GET `/idcard/`  获取一卡通表单信息

Quieries:

- `id` 表单唯一编号

Response(OK):

```json
    {
        "error": 0,
        "msg": "success",
        "data": {
            "name_owner": "test",
            "stuno": "17051818",
            "describe": "描述",
            "url": "http:\/\/phi28j82d.bkt.clouddn.com\/lost-found\/image\/test\/185DBD48799A57DC5125F5805BBE5F72.jpg",
            "name_pickup": "test",
            "contactType": "QQ",
            "contact": "contact",
            "timestamp": "1543818517"
        }
    }
```

### POST `/lost/`  提交遗失物拾取表单

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

### GET `/lost/`  获取遗失物表单信息

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

### GET `/id/`  获取id列表

Quieries:

- `type` 表单类型：①`lost` ②`idcard`(一卡通拾取)

eg：`http://www.buhuiphp.com/id/?type=lost`

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
### POST `/lost/update.php`  修改某拾取物物品描述

Quieries:

- `id` 表单唯一编号
- `describe` 新物品描述

Response(OK):

```json
    {
     "error":0,
     "msg":"success"
    }
```
### GET `/lost/delete.php` 删除某拾取物信息

Quieries:

- `id` 表单唯一编号

eg：`http://www.buhuiphp.com/lost/delete.php?id=z09n8p`

Response(OK):

```json
    {
     "error":0,
     "msg":"success"
    }
```

### POST `/qq/`  获取跳转QQ链接

Response(OK):

`url`就是跳转链接

```json
    {
        "url":"www.buhuiphp.com\/inc\/openqq.php"
    }
```
### GET `/rank/`  获取排名降序

Response(OK):

```json
    [{
        "type": "鼠标",
        "count": "3"
    }, {
        "type": "type",
        "count": "1"
    }, {
        "type": "手机",
        "count": "1"
    }, {
        "type": "U盘",
        "count": "1"
    }]
```