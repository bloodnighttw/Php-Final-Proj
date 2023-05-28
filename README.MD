# [PHP 期末專題](https://github.com/bloodnighttw/Php-Final-Proj)

## 架構

- `/api` 存放AJAX呼叫的API地方
- `/img` 存放圖片的地方
- `/img/avatar` 存放使用者圖片的地方
- `/import` 存放會重複使用的PHP程式
- `/js` 存放javascript的地方
- 其他地方則是存放網頁的地方

## 資料庫連線

- 連線部分使用PDO而不是`mysqli`，原因後面會講
- 使用`prepare`避免sql injection，使用方法如下
    ```php
    $stmt = $db->prepare('SELECT id,username,email,password FROM User where email=? or username =? and password=?');
    $stmt->execute([$_POST['email'],$_POST['email'],$_POST['pwd']]);
    $result = $stmt->fetch();
    if(is_array($result)){
        $_SESSION['userid']=$result['id'];
    }
    ```
- 因為mysqli的`prepare`在使用 `SELECT`時，有時候會有一些狀況，所以改成使用`PDO`。

### USER

- 儲存使用者的登入資訊，其中id會是獨特的(auto increase)。

|         id         |  username   |  email  |  password   |
|:------------------:|:-----------:|:-------:|:-----------:|
| PRIMARY KEY INT(8) | VARCHAR(16) | INT(48) | VARCHAR(16) |
|       使用者ID        |    使用者名稱    |  使用者信箱  |    使用者密碼    |

### PROFILE

- 儲存使用者的簡介資訊。

|         id         |   badge_id    | description |
|:------------------:|:-------------:|:-----------:|
| PRIMARY KEY INT(8) |    INT(8)     |    TEXT     |
|    對應User的使用者ID    | 使用者名稱使用的badge |   使用者自我介紹   |

### BADGEINFO

- 儲存商品資訊。

|         id         |     name      | description | price  | img_id |
|:------------------:|:-------------:|:-----------:|:------:|:------:|
| PRIMARY KEY INT(8) |  VARCHAR(12)  |    TEXT     | INT(2) | INT(8) |
|       商品的ID        | 使用者名稱使用的badge |    商品介紹     |   價格   | 圖片的id  |

### INVENTORY

- 儲存使用者已經購買的東西

| user_id |  name  | amount |
|:-------:|:------:|:------:|
| INT(8)  | INT(8) | INT(8) |
| 使用者的ID  |  商品id  |   數量   |

---

### PERMISSION(尚未完成)
|         id         | permission |
|:------------------:|:----------:|
| PRIMARY KEY INT(8) |   INT(8)   |
|       使用者ID        |   使用者名稱    |

### Content(尚未完成)

|         id         |    title     |   time    | content | upvote | downvote |
|:------------------:|:------------:|:---------:|:-------:|:------:|:--------:|
| PRIMARY KEY INT(8) | VARCHAR(128) | TIMESTAMP |  TEXT   | INT(8) |  INT(8)  |
|       文章的ID        |     文章標題     |    時間     |  文章內容   | upvote | downvote |

### Comment(尚未完成)

|         id         | contentid |   time    | content | upvote | downvote |
|:------------------:|:---------:|:---------:|:-------:|:------:|:--------:|
| PRIMARY KEY INT(8) |  INT(8)   | TIMESTAMP |  TEXT   | INT(8) |  INT(8)  |
|       留言的ID        |   文章標題    |    時間     |  文章內容   | upvote | downvote |

### AD(尚未完成)

|         id         |    title     | content |     link     |
|:------------------:|:------------:|:-------:|:------------:|
| PRIMARY KEY INT(8) | VARCHAR(128) |  TEXT   | VARCHAR(128) |
|       廣告的ID        |     廣告標題     |  文章內容   |     廣告連結     |

## 論壇的文字編輯器

- 使用[quill.js](https://github.com/quilljs/quill)
- BSD-3-Clause 授權
- 編輯器可以吃delta格式跟HTML，但HTML必須寫死在網頁裡面。
    - delta是此編輯器的格式名稱，本身是JSON，可以透過javascript操控。
- 因為官方沒提供PHP的DELTA轉HTML的介面，直接讀取innerHTML又有XSS Attack的風險，因此使用api call實作這部分。

## 網頁(可使用的部分)

- `/login.php` 登入的部分，`GET` 和`POST`都在這邊處理。
- `/signin.php` 註冊的部分，`GET` 和`POST`都在這邊處理。
- `/index.php` 首頁(功能尚未時裝)
- `/logout.php` 登出會被導到這個網頁來，在清除所有`cookie`和`session`資訊後，重新導入到 `/index.php`
- `/profile.php?id={id}` 使用者資訊，id對應到使用者id，如果找不到id，將會被導到`/404.php`
- `/buy.php` 顯示所有可以購買的badge，會從資料庫裡的`BADGEINFO`撈資料。
- `/forget.php` 忘記密碼(功能尚未時裝)
- `/admin/new-badge.php` 新稱badge的網頁，只有管理員能進入。


## 網頁(規劃中)

- `/admin/new-ad.php` 新增廣告資訊的地方
- `/admin/ban-user.php?id={id}` 把使用者封禁的地方，`id`對應到使用者id。
- `/admin/del-content?id={id}` 刪除文章的地方，`id`對應到文章id。
- `/report.php?userid={userid}&contentid={contentid}&commentid={commentid}&r={url}` 檢舉的地方，`userid`
  對應到使用者id，`commentid`對應到留言id，`contentid`對應到文章id，`url`對應到要回去的url，都可為空，但不可全為空。
- `/admin/report.php` 管理員篩選檢舉的地方。

## API (規劃中)

- 載入編輯器的網頁時，會setcookie()，把api token存進去client，呼叫api時，會使用此token。

### GET

- `/api/ad` 取的廣告資訊，會隨機傳送。
- `/api/content?id={id}` 回傳`content id`的 delta
- `/api/comment?id={id}` 回傳`comment id`的 delta

### POST

- `/api/upvote` upvote`content id`的 delta，
    ```json5
    {
        id: "123",//content id
        token:""
    }
  ```

- `/api/upvote` downvote`content id`的 delta，
    ```json5
    {
        id: "123",//content id
        token:""
    }
  ```
- `/api/content` 新增文章`content id`的 delta，
    ```json5
    {
        "token": "123",//the token
        "delta": { //delta object
              "ops": [
                      {
                          "attributes": {
                              "color": "#e60000",
                              "background": "#ffffcc",
                              "size": "huge"
                          },
                          "insert": "這是一個留言板，使用WYSIWYG(所見及所得)編輯器，使用Github上的開源專案"
                      },
                      {
                          "attributes": {
                              "color": "#e60000",
                              "background": "#ffffcc",
                              "size": "huge",
                              "link": "https://github.com/quilljs/quill/"
                          },
                          "insert": "Quill"
                      },
                      {
                          "attributes": {
                              "color": "#e60000",
                              "background": "#ffffcc",
                              "size": "huge"
                          },
                          "insert": " 修改而成。\n\n\n\n"
                      },
                      {
                          "insert": "\n\n"
                      }
              ]
        }
      
  }
  ```
- `/api/comment` 新增文章`content id`的留言 delta，
  ```json5
  {
      "id": 12,// the id of content you want to change
      "token": "123",//the token
      "delta": { //delta object
            "ops": [
                    {
                        "attributes": {
                            "color": "#e60000",
                            "size": "huge",
                            "background": "#ffffcc"
                        },
                        "insert": "這是一個留言板，使用WYSIWYG(所見及所得)編輯器，使用Github上的開源專案"
                    },
                    {
                        "attributes": {
                            "background": "#ffffcc",
                            "color": "#e60000",
                            "size": "huge",
                            "link": "https://github.com/quilljs/quill/"
                        },
                        "insert": "Quill"
                    },
                    {
                        "attributes": {
                            "color": "#e60000",
                            "background": "#ffffcc",
                            "size": "huge"
                        },
                        "insert": " 修改而成。\n\n\n\n"
                    },
                    {
                        "insert": "\n\n"
                    }
            ]
      }
      
  }
  ```


### PUT

- `/api/content` 編輯`content id`的 delta，
    ```json5
    {
        "id": 12,// the id of content you want to change
        "token": "123",//the token
        "delta": { //delta object
              "ops": [
                      {
                          "attributes": {
                              "color": "#e60000",
                              "background": "#ffffcc",
                              "size": "huge"
                          },
                          "insert": "這是一個留言板，使用WYSIWYG(所見及所得)編輯器，使用Github上的開源專案"
                      },
                      {
                          "attributes": {
                              "color": "#e60000",
                              "background": "#ffffcc",
                              "size": "huge",
                              "link": "https://github.com/quilljs/quill/"
                          },
                          "insert": "Quill"
                      },
                      {
                          "attributes": {
                              "color": "#e60000",
                              "background": "#ffffcc",
                              "size": "huge"
                          },
                          "insert": " 修改而成。\n\n\n\n"
                      },
                      {
                          "insert": "\n\n"
                      }
              ]
        }
      
    }
  ```