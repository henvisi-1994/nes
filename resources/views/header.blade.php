<!-- Header -->
<header>
    <div class="header_wrap">
        <div class="header_inner mcontainer">
            <div class="left_side">
                
                <!-- <span class="slide_menu" uk-toggle="target: #wrapper ; cls: is-collapse is-active">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path d="M3 4h18v2H3V4zm0 7h12v2H3v-2zm0 7h18v2H3v-2z" fill="currentColor"></path></svg>
                </span> -->

                <div id="logo">
                    <a href="/"> 
                        <img src="/frontend/assets/images/logo.png" alt="">
                        <img src="/frontend/assets/images/logo-mobile.png" class="logo_mobile" alt="">
                    </a>
                </div>
            </div>
                
            <!-- search icon for mobile -->
            <!-- <div class="header-search-icon" uk-toggle="target: #wrapper ; cls: show-searchbox"> </div>
            <div class="header_search"><i class="uil-search-alt"></i> 
                <input value="" type="text" class="form-control" placeholder="Search for Friends , Videos and more.." autocomplete="off">
                <div uk-drop="mode: click" class="header_search_dropdown">
                        
                    <h4 class="search_title"> Recently </h4>
                    <ul>
                        <li> 
                            <a href="#">  
                                <img src="/frontend/assets/images/avatars/avatar-1.jpg" alt="" class="list-avatar">
                                <div class="list-name">  Erica Jones </div>
                            </a> 
                        </li> 
                        <li> 
                            <a href="#">  
                                <img src="/frontend/assets/images/avatars/avatar-2.jpg" alt="" class="list-avatar">
                                <div class="list-name">  Coffee  Addicts </div>
                            </a> 
                        </li>
                        <li> 
                            <a href="#">  
                                <img src="/frontend/assets/images/avatars/avatar-3.jpg" alt="" class="list-avatar">
                                <div class="list-name"> Mountain Riders </div>
                            </a> 
                        </li>
                        <li> 
                            <a href="#">  
                                <img src="/frontend/assets/images/avatars/avatar-4.jpg" alt="" class="list-avatar">
                                <div class="list-name"> Property Rent And Sale  </div>
                            </a> 
                        </li>
                        <li> 
                            <a href="#">  
                                <img src="/frontend/assets/images/avatars/avatar-5.jpg" alt="" class="list-avatar">
                                <div class="list-name">  Erica Jones </div>
                            </a> 
                        </li>
                    </ul>

                </div>
            </div> -->
            

            <div class="right_side">

                <div class="header_widgets"> 
                    <!-- <a href="#" class="is_link">  Upgrade </a>   -->
                    {{--<a href="#" class="is_icon" uk-tooltip="title: Cart">
                        <svg fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M3 1a1 1 0 000 2h1.22l.305 1.222a.997.997 0 00.01.042l1.358 5.43-.893.892C3.74 11.846 4.632 14 6.414 14H15a1 1 0 000-2H6.414l1-1H14a1 1 0 00.894-.553l3-6A1 1 0 0017 3H6.28l-.31-1.243A1 1 0 005 1H3zM16 16.5a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0zM6.5 18a1.5 1.5 0 100-3 1.5 1.5 0 000 3z"></path></svg>
                    </a>
                    <div uk-drop="mode: click" class="header_dropdown dropdown_cart">
                        
                        <div class="drop_headline">
                            <h4>  My Cart </h4>
                            <a href="#" class="btn_action hover:bg-gray-100 mr-2 px-2 py-1 rounded-md underline"> Checkout </a>
                        </div>

                        <ul class="dropdown_cart_scrollbar" data-simplebar>
                            <li>
                                <div class="cart_avatar">
                                    <img src="/frontend/assets/images/product/2.jpg" alt="">
                                </div>
                                <div class="cart_text">
                                    <div class=" font-semibold leading-4 mb-1.5 text-base line-clamp-1"> Wireless headphones </div>
                                    <p class="text-sm">Type Accessories  </p>
                                </div>
                                <div class="cart_price">
                                    <span> $14.99 </span>
                                    <button class="type"> Remove</button>
                                </div>
                            </li>
                            <li>
                                <div class="cart_avatar">
                                    <img src="/frontend/assets/images/product/13.jpg" alt="">
                                </div>
                                <div class="cart_text">
                                    <div class=" font-semibold leading-4 mb-1.5 text-base line-clamp-1"> Parfum Spray</div>
                                    <p class="text-sm">Type Parfums  </p>
                                </div>
                                <div class="cart_price">
                                    <span> $16.99 </span>
                                    <button class="type"> Remove</button>
                                </div>
                            </li>
                            <li>
                                <div class="cart_avatar">
                                    <img src="/frontend/assets/images/product/15.jpg" alt="">
                                </div>
                                <div class="cart_text">
                                    <div class=" font-semibold leading-4 mb-1.5 text-base line-clamp-1"> Herbal Shampoo </div>
                                    <p class="text-sm">Type Herbel  </p>
                                </div>
                                <div class="cart_price">
                                    <span> $12.99 </span>
                                    <button class="type"> Remove</button>
                                </div>
                            </li>
                            <li>
                                <div class="cart_avatar">
                                    <img src="/frontend/assets/images/product/14.jpg" alt="">
                                </div>
                                <div class="cart_text">
                                    <div class=" font-semibold leading-4 mb-1.5 text-base line-clamp-1"> Wood Chair </div>
                                    <p class="text-sm">Type Furniture  </p>
                                </div>
                                <div class="cart_price">
                                    <span> $19.99 </span>
                                    <button class="type"> Remove</button>
                                </div>
                            </li>
                            <li>
                                <div class="cart_avatar">
                                    <img src="/frontend/assets/images/product/9.jpg" alt="">
                                </div>
                                <div class="cart_text">
                                    <div class=" font-semibold leading-4 mb-1.5 text-base line-clamp-1"> Strawberries FreshRipe </div>
                                    <p class="text-sm">Type Fruit  </p>
                                </div>
                                <div class="cart_price">
                                    <span> $12.99 </span>
                                    <button class="type"> Remove</button>
                                </div>
                            </li>
                            <li>
                                <div class="cart_avatar">
                                    <img src="/frontend/assets/images/product/2.jpg" alt="">
                                </div>
                                <div class="cart_text">
                                    <div class=" font-semibold leading-4 mb-1.5 text-base line-clamp-1"> Wireless headphones </div>
                                    <p class="text-sm">Type Accessories  </p>
                                </div>
                                <div class="cart_price">
                                    <span> $14.99 </span>
                                    <button class="type"> Remove</button>
                                </div>
                            </li>
                            <li>
                                <div class="cart_avatar">
                                    <img src="/frontend/assets/images/product/13.jpg" alt="">
                                </div>
                                <div class="cart_text">
                                    <div class=" font-semibold leading-4 mb-1.5 text-base line-clamp-1"> Parfum Spray</div>
                                    <p class="text-sm">Type Parfums  </p>
                                </div>
                                <div class="cart_price">
                                    <span> $16.99 </span>
                                    <button class="type"> Remove</button>
                                </div>
                            </li>
                        </ul>

                        <div class="cart_footer">
                            <p> Subtotal : $ 320 </p>
                            <h1> Total :  <strong> $ 320</strong> </h1>
                        </div>
                    </div> --}}

                    <a href="#" class="is_icon" uk-tooltip="title: Notifications">
                        <svg fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M10 2a6 6 0 00-6 6v3.586l-.707.707A1 1 0 004 14h12a1 1 0 00.707-1.707L16 11.586V8a6 6 0 00-6-6zM10 18a3 3 0 01-3-3h6a3 3 0 01-3 3z"></path></svg>
                        <span id="notification-number">{{count($notifications)}}</span>
                    </a>
                    <div uk-drop="mode: click" class="header_dropdown">
                            <div  class="dropdown_scrollbar" data-simplebar>
                                <div class="drop_headline">
                                    <h4>Notifications </h4>
                                    <div class="btn_action">
                                    {{-- <a href="#" data-tippy-placement="left" title="Notifications">
                                        <ion-icon name="settings-outline"></ion-icon>
                                    </a> --}}
                                    <a href="#" id="checkbox-outline-notifs" data-tippy-placement="left" title="Mark as read all">
                                        <ion-icon name="checkbox-outline"></ion-icon>
                                    </a>
                                </div>
                                </div>
                                <ul id="notifications-ul">
                                    @forelse ($notifications as $not)
                                    <li>
                                        <a href="/public_profile/{{$not->id}}">
                                            <div class="drop_avatar"> 
                                                <img src="/profile_images/{{$not->image}}" alt="user image">
                                            </div>
                                            <span class="drop_icon bg-gradient-primary">
                                                <i class="icon-feather-thumbs-up"></i>
                                            </span>
                                            <div class="drop_text">
                                                <p>
                                                <strong>{{$not->name}}</strong> te ha inviado un like!
                                                <span {{--class="text-link"--}} >Mira su perfil!</span>
                                                </p>
                                                <time> {{-- Ahora --}} </time>
                                            </div>
                                        </a>
                                    </li>
                                    @empty
                                    {{-- <span class="no-new-like-notif">No hay notificaciones</span> --}}
                                    @endforelse
                                    {{-- <li>
                                        <a href="#">
                                            <div class="drop_avatar"> 
                                                <img src="/frontend/assets/images/avatars/avatar-1.jpg" alt="">
                                            </div>
                                            <span class="drop_icon bg-gradient-primary">
                                                <i class="icon-feather-thumbs-up"></i>
                                            </span>
                                            <div class="drop_text">
                                                <p>
                                                <strong>Adrian Mohani</strong> Like Your Comment On Video
                                                <span class="text-link">Learn Prototype Faster </span>
                                                </p>
                                                <time> 2 hours ago </time>
                                            </div>
                                        </a>
                                    </li> --}}
                                    {{-- <li class="not-read">
                                        <a href="#">
                                            <div class="drop_avatar status-online"> <img src="/frontend/assets/images/avatars/avatar-2.jpg" alt="">
                                            </div>
                                            <div class="drop_text">
                                                <p>
                                                <strong>Stella Johnson</strong> Replay Your Comments in
                                                <span class="text-link">Adobe XD Tutorial</span>
                                                </p>
                                                <time> 9 hours ago </time>
                                            </div>
                                        </a>
                                    </li> --}}
                                </ul> 
                            </div>
                    </div> 

                    <!-- Message -->
                    <a href="#" class="is_icon" uk-tooltip="title: Message">
                        <svg fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 5v8a2 2 0 01-2 2h-5l-5 4v-4H4a2 2 0 01-2-2V5a2 2 0 012-2h12a2 2 0 012 2zM7 8H5v2h2V8zm2 0h2v2H9V8zm6 0h-2v2h2V8z" clip-rule="evenodd"></path></svg>
                        <span id="notificaton-messages-num">{{$notifications_messages->count()}}</span>
                    </a>
                    <div uk-drop="mode: click" class="header_dropdown is_message">
                        <div  class="dropdown_scrollbar" data-simplebar>
                            <div class="drop_headline">
                                    <h4>Messages </h4>
                                <div class="btn_action">
                                    {{-- <a href="#" data-tippy-placement="left" title="Notifications">
                                        <ion-icon name="settings-outline" uk-tooltip="title: Message settings ; pos: left"></ion-icon>
                                    </a> --}}
                                    <a href="#" id="checkbox-outline-messages" data-tippy-placement="left" title="Mark as read all">
                                        <ion-icon name="checkbox-outline"></ion-icon>
                                    </a>
                                </div>
                            </div>
                            {{-- <input type="text" class="uk-input" placeholder="Search in Messages"> --}}
                            <ul id="notification-messages-ul">
                                @forelse ($notifications_messages as $message)
                                <li class="un-read">
                                    <a href="/messages/{{$message->messagingUserID}}">
                                        <div class="drop_avatar"> <img src="" alt="">
                                        </div>
                                        <div class="drop_text">
                                            <strong> {{$message->messagingUserName}} </strong> <time>12:43 PM</time>
                                            <p>  {{$message->message}}  </p>
                                        </div>
                                    </a>
                                </li>
                                @empty
                                {{-- <span class="no-new-message-notif">No hay nuevos mensajes, escribe a alguien!</span> --}}
                                @endforelse
                                {{-- 
                                <li class="un-read">
                                    <a href="#">
                                        <div class="drop_avatar"> <img src="/frontend/assets/images/avatars/avatar-7.jpg" alt="">
                                        </div>
                                        <div class="drop_text">
                                            <strong> Stella Johnson </strong> <time>12:43 PM</time>
                                            <p>  Alex will explain you how ...  </p>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <div class="drop_avatar"> <img src="/frontend/assets/images/avatars/avatar-1.jpg" alt="">
                                        </div>
                                        <div class="drop_text">
                                            <strong> Adrian Mohani </strong> <time> 6:43 PM</time>
                                            <p> Thanks for The Answer sit amet...  </p>
                                        </div>
                                    </a>
                                </li> --}}
                            </ul>
                        </div>
                        <a href="/messages" class="see-all"> See all in Messages</a>
                    </div>
    

                    <a href="#">
                        <img src="/profile_images/{{auth()->user()->image}}" class="is_avatar" alt="">
                    </a>
                    <div uk-drop="mode: click;offset:5" class="header_dropdown profile_dropdown">

                        <a href="/profile" class="user">
                            <div class="user_avatar">
                                <img src="/profile_images/{{auth()->user()->image}}" alt="">
                            </div>
                            <div class="user_name">
                                <div> {{auth()->user()->name}} </div>
                            </div>
                        </a>
                        <hr>
                        {{-- <a href="#" class="is-link" uk-toggle="target: #create-post-modal">
                            <svg fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M12.395 2.553a1 1 0 00-1.45-.385c-.345.23-.614.558-.822.88-.214.33-.403.713-.57 1.116-.334.804-.614 1.768-.84 2.734a31.365 31.365 0 00-.613 3.58 2.64 2.64 0 01-.945-1.067c-.328-.68-.398-1.534-.398-2.654A1 1 0 005.05 6.05 6.981 6.981 0 003 11a7 7 0 1011.95-4.95c-.592-.591-.98-.985-1.348-1.467-.363-.476-.724-1.063-1.207-2.03zM12.12 15.12A3 3 0 017 13s.879.5 2.5.5c0-1 .5-4 1.25-4.5.5 1 .786 1.293 1.371 1.879A2.99 2.99 0 0113 13a2.99 2.99 0 01-.879 2.121z" clip-rule="evenodd"></path></svg>
                            Upgrade To Premium  </span>
                        </a> --}}
                        <hr>
                        <a href="/profile">
                            <svg fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M11.49 3.17c-.38-1.56-2.6-1.56-2.98 0a1.532 1.532 0 01-2.286.948c-1.372-.836-2.942.734-2.106 2.106.54.886.061 2.042-.947 2.287-1.561.379-1.561 2.6 0 2.978a1.532 1.532 0 01.947 2.287c-.836 1.372.734 2.942 2.106 2.106a1.532 1.532 0 012.287.947c.379 1.561 2.6 1.561 2.978 0a1.533 1.533 0 012.287-.947c1.372.836 2.942-.734 2.106-2.106a1.533 1.533 0 01.947-2.287c1.561-.379 1.561-2.6 0-2.978a1.532 1.532 0 01-.947-2.287c.836-1.372-.734-2.942-2.106-2.106a1.532 1.532 0 01-2.287-.947zM10 13a3 3 0 100-6 3 3 0 000 6z" clip-rule="evenodd"></path></svg>
                            My Account 
                        </a>
                        {{-- <a href="group-feed.html">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M3 6a3 3 0 013-3h10a1 1 0 01.8 1.6L14.25 8l2.55 3.4A1 1 0 0116 13H6a1 1 0 00-1 1v3a1 1 0 11-2 0V6z"  clip-rule="evenodd" />
                            </svg>
                            Manage Pages 
                        </a>
                        <a href="group-feed.html">
                            <svg fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M4 4a2 2 0 00-2 2v1h16V6a2 2 0 00-2-2H4z"></path><path fill-rule="evenodd" d="M18 9H2v5a2 2 0 002 2h12a2 2 0 002-2V9zM4 13a1 1 0 011-1h1a1 1 0 110 2H5a1 1 0 01-1-1zm5-1a1 1 0 100 2h1a1 1 0 100-2H9z" clip-rule="evenodd"></path></svg>
                            My Billing 
                        </a> --}}
                        <a href="#" id="night-mode" class="btn-night-mode">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                <path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z" />
                                </svg>
                                Night mode
                            <span class="btn-night-mode-switch">
                                <span class="uk-switch-button"></span>
                            </span>
                        </a>
                        <a href="/logout">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
                            </svg>
                            Log Out 
                        </a>

                        
                    </div>

                </div>
                
            </div>
        </div>
    </div>
</header>