<div class="card-grid-space">
    <div class="num">{{$post -> id}}</div>
    <a class="card" href="posts/{{$post -> id}}"
        style="--bg-img: url(https://images1-focus-opensocial.googleusercontent.com/gadgets/proxy?container=focus&resize_w=1500&url=https://codetheweb.blog/assets/img/posts/html-syntax/cover.jpg)">
        <div>
            <h1>{{$post -> title}}</h1>
            <p>{{$post -> body}}</p>
            <div class="date">{{$post -> created_at}}</div>
            <div class="tags">
                <div class="tag">HTML</div>
            </div>
        </div>
    </a>
</div>