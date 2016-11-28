{{-- 页脚 --}}
<div id="silence_footer" class="ui inverted vertical footer segment">
    <div class="ui center aligned container">

        {{-- 页脚内容 --}}
        <div class="ui stackable inverted divided grid">

            {{-- 统计 --}}
            <div class="five wide column">
                <h4 class="ui inverted header">统计</h4>
                <div class="ui inverted link list">
                    <div class="ui inverted segment">
                        <div class="ui inverted statistic">
                            <div class="value">
                                {{ $all_book_number }}
                            </div>
                            <div class="label">
                                藏书
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- 社会化网络 --}}
            <div class="three wide column">
                <h4 class="ui inverted header">作者微博</h4>
                <div class="ui inverted link list left aligned">
                    <a href="http://weibo.com/u/1993774897" class="item"><i class="weibo icon"></i>張張張翔亮</a>
                </div>
            </div>

            {{-- 捐助 --}}
            <div class="eight wide column">
                <h4 class="ui inverted teal header">帮助维持本项目</h4>
                <p>该网站现在是由 Lyon 维护和承担服务开销。 如果你乐意赞助一点来减轻我们的负担，我们将万分感谢。</p>
                <img class="code" src="{{ asset('assets/images/code.png') }}" alt="">
            </div>
        </div>

        {{-- 分割线 --}}
        <div class="ui inverted divider"></div>

        {{-- Copyright --}}
        <div class="ui horizontal inverted small divided link list">
            <a class="item"><i class="copyright icon"></i>
                MNNULIB 2015. All rights reserved.</a>
            <a class="item" href="http://www.miibeian.gov.cn/">闽ICP备15019128号</a>
        </div>

    </div>
</div>

