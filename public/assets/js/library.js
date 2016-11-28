// Semantic-ui 下拉菜单
$('.ui.dropdown').dropdown({
    on: 'hover'
});

// Semantic-ui 侧边栏菜单
$('.sidebar.menu').first().
        sidebar('attach events', '.toc.item');

// a 标签替换 button
if(document.getElementById('library_search')){
    document.getElementById('library_search').addEventListener('click', function () {
        document.getElementById('library_search_button').click();
    }, false);
}

// 侧边栏下拉菜单
$('.accordion').accordion({
    exclusive: true,
    on: 'click',
});