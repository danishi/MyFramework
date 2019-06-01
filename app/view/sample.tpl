<!DOCTYPE>
<html lang="ja">
{config_load file='smarty.config'}
<head>
{include file='template/head_tag.tpl'}
</head>
{include file='template/header.tpl' title=$title}
<body class="d-flex flex-column h-100">
    <main role="main" class="flex-shrink-0">
        <div class="container">
            <h1>Sample Page!</h1>
            <p>{$message}</p>
        </div>
        <form method="post" class="form-horizontal">
            <div class="form-group ml-5">
                <button name="delete" type="submit" class="btn btn-danger">delete</button>
            </div>
            <table class="table table-striped">
                <tr>
                    <th>delete</th>
                    <th>id</th>
                    <th>name</th>
                </tr>
                {foreach from=$list item=item}
                <tr>
                    <td>
                        <input type="checkbox" name="item[{$item['id']}]" />
                    </td>
                    <td>{$item['id']}</td>
                    <td>{$item['name']}</td>
                </tr>
                {/foreach}
            </table>
        </form>
        <form class="form-inline" method="post">
            <label>&nbsp;Name&nbsp;</label><input type="text" name="name" class="form-control" placeholder="input new name">
            <button name="add" type="submit" class="btn btn-info">register</button>
        </form>
    </main>
</body>
{include file='template/footer.tpl' copyright='danishi'}
{include file='template/foot_tag.tpl'}
</html>
