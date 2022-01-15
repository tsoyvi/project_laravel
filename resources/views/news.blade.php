<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Новости</title>

    <!-- Styles -->
    <style>
        body {
            margin: 0 auto;
        }

        .container {
            margin: 0 auto;
            width: 90%;
            text-align: center;
        }

        .news-block {
            display: flex;
            justify-content: center;

        }

        .news {
            width: 300px;
            outline: blue solid 1px;
            margin: 0 10px;
        }

        h5 {
            margin: 5px;
        }
    </style>

</head>

<body>
    <div class="container">
        <h1>Новости</h1>
        <div class="news-block">
            <div class="news">
                <h5>News1</h5>
                Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                Accusantium voluptate, doloribus nobis libero dicta nam sapiente
                inventore quidem nesciunt harum non consectetur, modi quisquam ex
                tempore excepturi laboriosam quibusdam quasi.
            </div>
            <div class="news">
                <h5>News2</h5>
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Itaque, ratione?
            </div>
            <div class="news">
                <h5>News3</h5>
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Quibusdam quod molestias 
                aspernatur quidem odio incidunt ullam provident amet et sed architecto, pariatur ducimus tempora iusto, 
                natus molestiae consequuntur quaerat accusantium dolore dolorem consectetur distinctio repellendus.
                 Laudantium laboriosam perferendis recusandae accusantium molestias, exercitationem, eos distinctio molestiae, 
                 cum porro provident natus beatae consectetur impedit iste dolores. Quis, sequi error ea minima vero, modi voluptates sit 
                 voluptate saepe nihil harum non laboriosam velit at totam iste inventore tempora impedit unde. Dolorum vero ad omnis beatae, 
                 alias eos autem doloremque veritatis reiciendis optio eius rem nemo. Id ipsam veritatis obcaecati autem ducimus? Distinctio, 
                 inventore!
            </div>
        </div>
    </div>
</body>

</html>