@extends('layouts.partials.mainlayout')
@section('body')
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-fullscreen scrollable mw-100 m-2 px-3 py-2" role="document">
            <div class="modal-content">
                <div class="modal-header d-flex justify-content-between title_style">
                    <div>
                        <h5 class="modal-title" id="exampleModalLabel">New {{ $module['singular'] }}</h5>
                    </div>
                    <div>
                        <button type="button" class="close text-white h6" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">x</span>
                        </button>
                    </div>
                </div>
                <div class="modal-body">
                    ...
                </div>
            </div>
        </div>
    </div>
    {{-- Modal End --}}

    {{-- customer design implementation --}}
    <div class="bg-white rounded p-2">
        {{-- badges start --}}
        <div class="d-flex m-2">
            <div class="col-4 p-1">
                <div class="col-12 py-0 px-1">
                    <div class="col-12 border-style card-rounded py-2 px-3">
                        <div class="d-flex">
                            <div class="col-10 text-muted p-0 d-flex align-items-center">
                                <div class="font-size"><span>New Orders</span></div>
                            </div>
                            <div class="col-2 p-2 d-flex justify-content-center align-items-center rounded"
                                style="background: rgba(105, 108, 255, 0.16); !important">
                                <svg width="15" height="15" viewBox="0 0 26 26" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M13 2.16602C11.9287 2.16602 10.8814 2.4837 9.99066 3.07889C9.0999 3.67408 8.40563 4.52005 7.99565 5.50981C7.58568 6.49958 7.47841 7.58869 7.68741 8.63942C7.89642 9.69015 8.4123 10.6553 9.16984 11.4128C9.92737 12.1704 10.8925 12.6863 11.9433 12.8953C12.994 13.1043 14.0831 12.997 15.0729 12.587C16.0626 12.1771 16.9086 11.4828 17.5038 10.592C18.099 9.70125 18.4167 8.654 18.4167 7.58268C18.4167 6.14609 17.846 4.76834 16.8302 3.75252C15.8143 2.7367 14.4366 2.16602 13 2.16602ZM13 10.8327C12.3572 10.8327 11.7289 10.6421 11.1944 10.285C10.6599 9.92784 10.2434 9.42026 9.99739 8.8264C9.75141 8.23254 9.68705 7.57908 9.81245 6.94864C9.93785 6.3182 10.2474 5.73911 10.7019 5.28459C11.1564 4.83006 11.7355 4.52053 12.366 4.39513C12.9964 4.26973 13.6499 4.33409 14.2437 4.58007C14.8376 4.82606 15.3452 5.24262 15.7023 5.77708C16.0594 6.31154 16.25 6.93989 16.25 7.58268C16.25 8.44464 15.9076 9.27129 15.2981 9.88078C14.6886 10.4903 13.862 10.8327 13 10.8327ZM22.75 22.7493V21.666C22.75 19.6548 21.951 17.7259 20.5289 16.3038C19.1067 14.8816 17.1779 14.0827 15.1667 14.0827H10.8333C8.82211 14.0827 6.89326 14.8816 5.47111 16.3038C4.04896 17.7259 3.25 19.6548 3.25 21.666V22.7493H5.41667V21.666C5.41667 20.2294 5.98735 18.8517 7.00317 17.8359C8.01899 16.82 9.39674 16.2493 10.8333 16.2493H15.1667C16.6033 16.2493 17.981 16.82 18.9968 17.8359C20.0127 18.8517 20.5833 20.2294 20.5833 21.666V22.7493H22.75Z"
                                        fill="#696CFF" />
                                </svg>


                            </div>
                        </div>
                        <div>
                            <div class="font-bold"><span>{{ @$new_orders->count() }}</span> </div>
                            <div class="py-1 col-12 text-muted p-0 font-size"><span>Total User</span></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-4 p-1">
                <div class="col-12 py-0 px-1">
                    <div class="col-12 border-style card-rounded py-2 px-3">
                        <div class="d-flex">
                            <div class="col-10 text-muted p-0 d-flex align-items-center">
                                <div class="font-size"><span>Posted</span></div>
                            </div>
                            <div class="col-2 p-2 d-flex justify-content-center align-items-center rounded"
                                style="background: rgba(239, 87, 87, 0.13);!important">
                                <svg width="15" height="15" viewBox="0 0 26 26" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M15.167 11.9165H23.8337V14.0832H15.167V11.9165ZM8.66699 4.33318C8.09428 4.31984 7.52482 4.42281 6.99304 4.63585C6.46127 4.8489 5.97823 5.1676 5.57316 5.57268C5.16808 5.97775 4.84938 6.46079 4.63633 6.99256C4.42328 7.52434 4.32032 8.0938 4.33366 8.66651C4.32032 9.23922 4.42328 9.80869 4.63633 10.3405C4.84938 10.8722 5.16808 11.3553 5.57316 11.7603C5.97823 12.1654 6.46127 12.4841 6.99304 12.6972C7.52482 12.9102 8.09428 13.0132 8.66699 12.9998C9.2397 13.0132 9.80917 12.9102 10.3409 12.6972C10.8727 12.4841 11.3558 12.1654 11.7608 11.7603C12.1659 11.3553 12.4846 10.8722 12.6977 10.3405C12.9107 9.80869 13.0137 9.23922 13.0003 8.66651C13.0137 8.0938 12.9107 7.52434 12.6977 6.99256C12.4846 6.46079 12.1659 5.97775 11.7608 5.57268C11.3558 5.1676 10.8727 4.8489 10.3409 4.63585C9.80917 4.42281 9.2397 4.31984 8.66699 4.33318V4.33318ZM8.66699 10.8332C8.37877 10.8471 8.09082 10.8006 7.82164 10.6967C7.55246 10.5927 7.308 10.4336 7.10396 10.2295C6.89992 10.0255 6.74081 9.78105 6.63685 9.51186C6.5329 9.24268 6.48639 8.95473 6.50033 8.66651C6.48639 8.37829 6.5329 8.09034 6.63685 7.82116C6.74081 7.55198 6.89992 7.30752 7.10396 7.10348C7.308 6.89944 7.55246 6.74033 7.82164 6.63637C8.09082 6.53242 8.37877 6.48591 8.66699 6.49985C8.95521 6.48591 9.24316 6.53242 9.51234 6.63637C9.78152 6.74033 10.026 6.89944 10.23 7.10348C10.4341 7.30752 10.5932 7.55198 10.6971 7.82116C10.8011 8.09034 10.8476 8.37829 10.8337 8.66651C10.8476 8.95473 10.8011 9.24268 10.6971 9.51186C10.5932 9.78105 10.4341 10.0255 10.23 10.2295C10.026 10.4336 9.78152 10.5927 9.51234 10.6967C9.24316 10.8006 8.95521 10.8471 8.66699 10.8332V10.8332ZM4.33366 19.4998C4.33366 18.6379 4.67607 17.8112 5.28556 17.2017C5.89505 16.5923 6.7217 16.2498 7.58366 16.2498H9.75032C10.6123 16.2498 11.4389 16.5923 12.0484 17.2017C12.6579 17.8112 13.0003 18.6379 13.0003 19.4998V20.5832H15.167V19.4998C15.167 18.7885 15.0269 18.0842 14.7547 17.427C14.4825 16.7698 14.0835 16.1727 13.5805 15.6697C13.0775 15.1667 12.4804 14.7677 11.8232 14.4955C11.166 14.2233 10.4617 14.0832 9.75032 14.0832H7.58366C6.14707 14.0832 4.76932 14.6539 3.7535 15.6697C2.73768 16.6855 2.16699 18.0633 2.16699 19.4998V20.5832H4.33366V19.4998Z"
                                        fill="#E41414" />
                                </svg>

                            </div>
                        </div>
                        <div>
                            <div class="font-bold"><span>{{ @$posted->count() }}</span> </div>
                            <div class="py-1 col-12 text-muted p-0 font-size"><span>Last week Analytics</span></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-4 p-1">
                <div class="col-12 py-0 px-1">
                    <div class="col-12 border-style card-rounded py-2 px-3">
                        <div class="d-flex">
                            <div class="col-10 text-muted p-0 d-flex align-items-center">
                                <div class="font-size"><span>Dispatched</span></div>
                            </div>
                            <div class="col-2 p-2 d-flex justify-content-center align-items-center rounded"
                                style="background: rgba(236, 184, 0, 0.15); !important">
                                <svg width="15" height="15" viewBox="0 0 26 26" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M15.1667 13.2715C14.3632 13.2715 13.5777 13.0332 12.9097 12.5868C12.2416 12.1404 11.7209 11.506 11.4134 10.7636C11.1059 10.0213 11.0255 9.20448 11.1822 8.41643C11.339 7.62838 11.7259 6.90452 12.294 6.33636C12.8622 5.76821 13.5861 5.3813 14.3741 5.22455C15.1622 5.06779 15.979 5.14824 16.7213 5.45573C17.4636 5.76321 18.0981 6.28391 18.5445 6.95198C18.9909 7.62006 19.2292 8.4055 19.2292 9.20899C19.2292 10.2864 18.8012 11.3197 18.0393 12.0816C17.2774 12.8435 16.2441 13.2715 15.1667 13.2715ZM15.1667 6.77149C14.6846 6.77149 14.2133 6.91444 13.8125 7.18228C13.4116 7.45011 13.0992 7.8308 12.9147 8.27619C12.7302 8.72159 12.682 9.21169 12.776 9.68452C12.8701 10.1573 13.1022 10.5917 13.4431 10.9326C13.784 11.2734 14.2183 11.5056 14.6911 11.5996C15.164 11.6937 15.6541 11.6454 16.0995 11.4609C16.5449 11.2765 16.9255 10.964 17.1934 10.5632C17.4612 10.1623 17.6042 9.69108 17.6042 9.20899C17.6042 8.56252 17.3474 7.94253 16.8902 7.48541C16.4331 7.02829 15.8131 6.77149 15.1667 6.77149V6.77149ZM22.75 20.8548C22.5354 20.852 22.3303 20.7655 22.1786 20.6137C22.0268 20.462 21.9403 20.2569 21.9375 20.0423C21.9375 17.9298 20.7892 16.5215 15.1667 16.5215C9.54417 16.5215 8.39583 17.9298 8.39583 20.0423C8.39583 20.2578 8.31023 20.4645 8.15786 20.6168C8.00548 20.7692 7.79882 20.8548 7.58333 20.8548C7.36785 20.8548 7.16118 20.7692 7.00881 20.6168C6.85644 20.4645 6.77083 20.2578 6.77083 20.0423C6.77083 14.8965 12.6533 14.8965 15.1667 14.8965C17.68 14.8965 23.5625 14.8965 23.5625 20.0423C23.5597 20.2569 23.4732 20.462 23.3214 20.6137C23.1697 20.7655 22.9646 20.852 22.75 20.8548V20.8548ZM9.01333 14.149H8.66667C7.80471 14.0657 7.01116 13.6433 6.46059 12.9749C5.91001 12.3065 5.64751 11.4468 5.73083 10.5848C5.81416 9.72287 6.23647 8.92931 6.90489 8.37874C7.5733 7.82816 8.43305 7.56566 9.295 7.64899C9.40552 7.65374 9.51391 7.68101 9.61352 7.72912C9.71313 7.77724 9.80187 7.84519 9.87429 7.92881C9.94671 8.01243 10.0013 8.10996 10.0347 8.21542C10.0681 8.32088 10.0796 8.43205 10.0685 8.54212C10.0574 8.65219 10.024 8.75883 9.97025 8.85552C9.9165 8.95221 9.84358 9.0369 9.75594 9.10441C9.6683 9.17191 9.5678 9.22082 9.4606 9.24811C9.3534 9.27541 9.24175 9.28053 9.1325 9.26315C8.92102 9.24207 8.70747 9.26381 8.50458 9.3271C8.3017 9.39038 8.11365 9.49391 7.95167 9.63149C7.78714 9.7642 7.65068 9.92834 7.55024 10.1143C7.4498 10.3003 7.3874 10.5045 7.36667 10.7148C7.34427 10.9278 7.36448 11.1431 7.42612 11.3483C7.48777 11.5534 7.58962 11.7442 7.72574 11.9095C7.86185 12.0749 8.02952 12.2115 8.21896 12.3114C8.4084 12.4113 8.61583 12.4725 8.82917 12.4915C9.18183 12.5217 9.5349 12.4381 9.83667 12.2532C10.0206 12.1397 10.242 12.1039 10.4523 12.1536C10.6625 12.2034 10.8444 12.3347 10.9579 12.5186C11.0714 12.7025 11.1072 12.9239 11.0574 13.1342C11.0077 13.3444 10.8764 13.5263 10.6925 13.6398C10.19 13.9603 9.60915 14.1364 9.01333 14.149V14.149ZM3.25 20.0423C3.03538 20.0395 2.83035 19.953 2.67858 19.8012C2.52681 19.6495 2.44031 19.4444 2.4375 19.2298C2.4375 16.3048 3.2175 14.3548 7.04167 14.3548C7.25716 14.3548 7.46382 14.4404 7.61619 14.5928C7.76856 14.7452 7.85417 14.9518 7.85417 15.1673C7.85417 15.3828 7.76856 15.5895 7.61619 15.7418C7.46382 15.8942 7.25716 15.9798 7.04167 15.9798C4.49583 15.9798 4.0625 16.7923 4.0625 19.2298C4.05969 19.4444 3.97319 19.6495 3.82142 19.8012C3.66965 19.953 3.46462 20.0395 3.25 20.0423V20.0423Z"
                                        fill="#ECB800" />
                                </svg>

                            </div>
                        </div>
                        <div>
                            <div class="font-bold"><span class="px-1">{{ @$dispatched->count() }}</span><span
                                    class="percent_size">(-14%)</span>
                            </div>
                            <div class="py-1 col-12 text-muted p-0 font-size"><span>Last week Analytics</span></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="d-flex m-2">
            <div class="col-4 p-1">
                <div class="col-12 py-0 px-1">
                    <div class="col-12 border-style card-rounded py-2 px-3">
                        <div class="d-flex">
                            <div class="col-10 text-muted p-0 d-flex align-items-center">
                                <div class="font-size"><span>On Hand</span></div>
                            </div>
                            <div class="col-2 p-2 d-flex justify-content-center align-items-center rounded"
                                style="background: rgba(105, 108, 255, 0.16); !important">
                                <svg width="15" height="15" viewBox="0 0 26 26" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M13 2.16602C11.9287 2.16602 10.8814 2.4837 9.99066 3.07889C9.0999 3.67408 8.40563 4.52005 7.99565 5.50981C7.58568 6.49958 7.47841 7.58869 7.68741 8.63942C7.89642 9.69015 8.4123 10.6553 9.16984 11.4128C9.92737 12.1704 10.8925 12.6863 11.9433 12.8953C12.994 13.1043 14.0831 12.997 15.0729 12.587C16.0626 12.1771 16.9086 11.4828 17.5038 10.592C18.099 9.70125 18.4167 8.654 18.4167 7.58268C18.4167 6.14609 17.846 4.76834 16.8302 3.75252C15.8143 2.7367 14.4366 2.16602 13 2.16602ZM13 10.8327C12.3572 10.8327 11.7289 10.6421 11.1944 10.285C10.6599 9.92784 10.2434 9.42026 9.99739 8.8264C9.75141 8.23254 9.68705 7.57908 9.81245 6.94864C9.93785 6.3182 10.2474 5.73911 10.7019 5.28459C11.1564 4.83006 11.7355 4.52053 12.366 4.39513C12.9964 4.26973 13.6499 4.33409 14.2437 4.58007C14.8376 4.82606 15.3452 5.24262 15.7023 5.77708C16.0594 6.31154 16.25 6.93989 16.25 7.58268C16.25 8.44464 15.9076 9.27129 15.2981 9.88078C14.6886 10.4903 13.862 10.8327 13 10.8327ZM22.75 22.7493V21.666C22.75 19.6548 21.951 17.7259 20.5289 16.3038C19.1067 14.8816 17.1779 14.0827 15.1667 14.0827H10.8333C8.82211 14.0827 6.89326 14.8816 5.47111 16.3038C4.04896 17.7259 3.25 19.6548 3.25 21.666V22.7493H5.41667V21.666C5.41667 20.2294 5.98735 18.8517 7.00317 17.8359C8.01899 16.82 9.39674 16.2493 10.8333 16.2493H15.1667C16.6033 16.2493 17.981 16.82 18.9968 17.8359C20.0127 18.8517 20.5833 20.2294 20.5833 21.666V22.7493H22.75Z"
                                        fill="#696CFF" />
                                </svg>


                            </div>
                        </div>
                        <div>
                            <div class="font-bold"><span>{{ @$on_hand->count() }}</span> </div>
                            <div class="py-1 col-12 text-muted p-0 font-size"><span>Total User</span></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-4 p-1">
                <div class="col-12 py-0 px-1">
                    <div class="col-12 border-style card-rounded py-2 px-3">
                        <div class="d-flex">
                            <div class="col-10 text-muted p-0 d-flex align-items-center">
                                <div class="font-size"><span>No Titles</span></div>
                            </div>
                            <div class="col-2 p-2 d-flex justify-content-center align-items-center rounded"
                                style="background: rgba(239, 87, 87, 0.13);!important">
                                <svg width="15" height="15" viewBox="0 0 26 26" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M15.167 11.9165H23.8337V14.0832H15.167V11.9165ZM8.66699 4.33318C8.09428 4.31984 7.52482 4.42281 6.99304 4.63585C6.46127 4.8489 5.97823 5.1676 5.57316 5.57268C5.16808 5.97775 4.84938 6.46079 4.63633 6.99256C4.42328 7.52434 4.32032 8.0938 4.33366 8.66651C4.32032 9.23922 4.42328 9.80869 4.63633 10.3405C4.84938 10.8722 5.16808 11.3553 5.57316 11.7603C5.97823 12.1654 6.46127 12.4841 6.99304 12.6972C7.52482 12.9102 8.09428 13.0132 8.66699 12.9998C9.2397 13.0132 9.80917 12.9102 10.3409 12.6972C10.8727 12.4841 11.3558 12.1654 11.7608 11.7603C12.1659 11.3553 12.4846 10.8722 12.6977 10.3405C12.9107 9.80869 13.0137 9.23922 13.0003 8.66651C13.0137 8.0938 12.9107 7.52434 12.6977 6.99256C12.4846 6.46079 12.1659 5.97775 11.7608 5.57268C11.3558 5.1676 10.8727 4.8489 10.3409 4.63585C9.80917 4.42281 9.2397 4.31984 8.66699 4.33318V4.33318ZM8.66699 10.8332C8.37877 10.8471 8.09082 10.8006 7.82164 10.6967C7.55246 10.5927 7.308 10.4336 7.10396 10.2295C6.89992 10.0255 6.74081 9.78105 6.63685 9.51186C6.5329 9.24268 6.48639 8.95473 6.50033 8.66651C6.48639 8.37829 6.5329 8.09034 6.63685 7.82116C6.74081 7.55198 6.89992 7.30752 7.10396 7.10348C7.308 6.89944 7.55246 6.74033 7.82164 6.63637C8.09082 6.53242 8.37877 6.48591 8.66699 6.49985C8.95521 6.48591 9.24316 6.53242 9.51234 6.63637C9.78152 6.74033 10.026 6.89944 10.23 7.10348C10.4341 7.30752 10.5932 7.55198 10.6971 7.82116C10.8011 8.09034 10.8476 8.37829 10.8337 8.66651C10.8476 8.95473 10.8011 9.24268 10.6971 9.51186C10.5932 9.78105 10.4341 10.0255 10.23 10.2295C10.026 10.4336 9.78152 10.5927 9.51234 10.6967C9.24316 10.8006 8.95521 10.8471 8.66699 10.8332V10.8332ZM4.33366 19.4998C4.33366 18.6379 4.67607 17.8112 5.28556 17.2017C5.89505 16.5923 6.7217 16.2498 7.58366 16.2498H9.75032C10.6123 16.2498 11.4389 16.5923 12.0484 17.2017C12.6579 17.8112 13.0003 18.6379 13.0003 19.4998V20.5832H15.167V19.4998C15.167 18.7885 15.0269 18.0842 14.7547 17.427C14.4825 16.7698 14.0835 16.1727 13.5805 15.6697C13.0775 15.1667 12.4804 14.7677 11.8232 14.4955C11.166 14.2233 10.4617 14.0832 9.75032 14.0832H7.58366C6.14707 14.0832 4.76932 14.6539 3.7535 15.6697C2.73768 16.6855 2.16699 18.0633 2.16699 19.4998V20.5832H4.33366V19.4998Z"
                                        fill="#E41414" />
                                </svg>

                            </div>
                        </div>
                        <div>
                            <div class="font-bold"><span>{{ @$no_titles->count() }}</span> </div>
                            <div class="py-1 col-12 text-muted p-0 font-size"><span>Last week Analytics</span></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-4 p-1">
                <div class="col-12 py-0 px-1">
                    <div class="col-12 border-style card-rounded py-2 px-3">
                        <div class="d-flex">
                            <div class="col-10 text-muted p-0 d-flex align-items-center">
                                <div class="font-size"><span>Towing</span></div>
                            </div>
                            <div class="col-2 p-2 d-flex justify-content-center align-items-center rounded"
                                style="background: rgba(236, 184, 0, 0.15); !important">
                                <svg width="15" height="15" viewBox="0 0 26 26" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M15.1667 13.2715C14.3632 13.2715 13.5777 13.0332 12.9097 12.5868C12.2416 12.1404 11.7209 11.506 11.4134 10.7636C11.1059 10.0213 11.0255 9.20448 11.1822 8.41643C11.339 7.62838 11.7259 6.90452 12.294 6.33636C12.8622 5.76821 13.5861 5.3813 14.3741 5.22455C15.1622 5.06779 15.979 5.14824 16.7213 5.45573C17.4636 5.76321 18.0981 6.28391 18.5445 6.95198C18.9909 7.62006 19.2292 8.4055 19.2292 9.20899C19.2292 10.2864 18.8012 11.3197 18.0393 12.0816C17.2774 12.8435 16.2441 13.2715 15.1667 13.2715ZM15.1667 6.77149C14.6846 6.77149 14.2133 6.91444 13.8125 7.18228C13.4116 7.45011 13.0992 7.8308 12.9147 8.27619C12.7302 8.72159 12.682 9.21169 12.776 9.68452C12.8701 10.1573 13.1022 10.5917 13.4431 10.9326C13.784 11.2734 14.2183 11.5056 14.6911 11.5996C15.164 11.6937 15.6541 11.6454 16.0995 11.4609C16.5449 11.2765 16.9255 10.964 17.1934 10.5632C17.4612 10.1623 17.6042 9.69108 17.6042 9.20899C17.6042 8.56252 17.3474 7.94253 16.8902 7.48541C16.4331 7.02829 15.8131 6.77149 15.1667 6.77149V6.77149ZM22.75 20.8548C22.5354 20.852 22.3303 20.7655 22.1786 20.6137C22.0268 20.462 21.9403 20.2569 21.9375 20.0423C21.9375 17.9298 20.7892 16.5215 15.1667 16.5215C9.54417 16.5215 8.39583 17.9298 8.39583 20.0423C8.39583 20.2578 8.31023 20.4645 8.15786 20.6168C8.00548 20.7692 7.79882 20.8548 7.58333 20.8548C7.36785 20.8548 7.16118 20.7692 7.00881 20.6168C6.85644 20.4645 6.77083 20.2578 6.77083 20.0423C6.77083 14.8965 12.6533 14.8965 15.1667 14.8965C17.68 14.8965 23.5625 14.8965 23.5625 20.0423C23.5597 20.2569 23.4732 20.462 23.3214 20.6137C23.1697 20.7655 22.9646 20.852 22.75 20.8548V20.8548ZM9.01333 14.149H8.66667C7.80471 14.0657 7.01116 13.6433 6.46059 12.9749C5.91001 12.3065 5.64751 11.4468 5.73083 10.5848C5.81416 9.72287 6.23647 8.92931 6.90489 8.37874C7.5733 7.82816 8.43305 7.56566 9.295 7.64899C9.40552 7.65374 9.51391 7.68101 9.61352 7.72912C9.71313 7.77724 9.80187 7.84519 9.87429 7.92881C9.94671 8.01243 10.0013 8.10996 10.0347 8.21542C10.0681 8.32088 10.0796 8.43205 10.0685 8.54212C10.0574 8.65219 10.024 8.75883 9.97025 8.85552C9.9165 8.95221 9.84358 9.0369 9.75594 9.10441C9.6683 9.17191 9.5678 9.22082 9.4606 9.24811C9.3534 9.27541 9.24175 9.28053 9.1325 9.26315C8.92102 9.24207 8.70747 9.26381 8.50458 9.3271C8.3017 9.39038 8.11365 9.49391 7.95167 9.63149C7.78714 9.7642 7.65068 9.92834 7.55024 10.1143C7.4498 10.3003 7.3874 10.5045 7.36667 10.7148C7.34427 10.9278 7.36448 11.1431 7.42612 11.3483C7.48777 11.5534 7.58962 11.7442 7.72574 11.9095C7.86185 12.0749 8.02952 12.2115 8.21896 12.3114C8.4084 12.4113 8.61583 12.4725 8.82917 12.4915C9.18183 12.5217 9.5349 12.4381 9.83667 12.2532C10.0206 12.1397 10.242 12.1039 10.4523 12.1536C10.6625 12.2034 10.8444 12.3347 10.9579 12.5186C11.0714 12.7025 11.1072 12.9239 11.0574 13.1342C11.0077 13.3444 10.8764 13.5263 10.6925 13.6398C10.19 13.9603 9.60915 14.1364 9.01333 14.149V14.149ZM3.25 20.0423C3.03538 20.0395 2.83035 19.953 2.67858 19.8012C2.52681 19.6495 2.44031 19.4444 2.4375 19.2298C2.4375 16.3048 3.2175 14.3548 7.04167 14.3548C7.25716 14.3548 7.46382 14.4404 7.61619 14.5928C7.76856 14.7452 7.85417 14.9518 7.85417 15.1673C7.85417 15.3828 7.76856 15.5895 7.61619 15.7418C7.46382 15.8942 7.25716 15.9798 7.04167 15.9798C4.49583 15.9798 4.0625 16.7923 4.0625 19.2298C4.05969 19.4444 3.97319 19.6495 3.82142 19.8012C3.66965 19.953 3.46462 20.0395 3.25 20.0423V20.0423Z"
                                        fill="#ECB800" />
                                </svg>

                            </div>
                        </div>
                        <div>
                            <div class="font-bold"><span class="px-1">{{ @$towing->count() }}</span><span
                                    class="percent_size">(-14%)</span>
                            </div>
                            <div class="py-1 col-12 text-muted p-0 font-size"><span>Last week Analytics</span></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- badges end --}}

        {{-- listing start --}}
        <div class="px-3 mt-3">
            <div class="border-style card-rounded">
                {{-- new customer alert start --}}
                <div class="row d-flex justify-content-between">
                    <div>
                        @if (session('success'))
                            <div class="btn alert alert-success m-0">
                                <span>{{ session('success') }}</span>
                            </div>
                        @endif
                    </div>
                </div>
                {{-- alert end --}}
                {{-- search filter start --}}
                <div class="px-4 pt-2 mt-4">
                    <div>
                        <span class="h5 text-muted">
                            <b>Search Filter</b>
                        </span>
                    </div>
                    <div class="d-flex py-3 px-0">
                        <div class="col-3 p-0">
                            <select class="form-control-sm border-style input-border-style rounded col-11 text-muted px-2"
                                name="warehouse" id="warehouse">
                                <option value="new_jersey" disabled selected>New Jersey</option>
                                <option value="savannah">Savannah</option>
                                <option value="texas">Texas</option>
                                <option value="los_angeles">Los Angeles</option>
                                <option value="seattle">Seattle</option>
                                <option value="baltimore">Baltimore</option>
                                <option value="norfolk">Norfolk</option>
                            </select>
                        </div>
                        <div class="col-2 p-0">
                            <select class="form-control-sm border-style input-border-style rounded col-11 text-muted px-2"
                                name="year" id="year">
                                <option value="" disabled selected>YEAR</option>
                                <option value="2019">2019</option>
                                <option value="2020">2020</option>
                            </select>
                        </div>
                        <div class="col-2 p-0">
                            <select class="form-control-sm border-style input-border-style rounded col-11 text-muted px-2"
                                name="make" id="make">
                                <option value="" disabled selected>MAKE</option>
                                <option value="honda">Honda</option>
                                <option value="toyota">Toyota</option>
                            </select>
                        </div>
                        <div class="col-2 p-0">
                            <select class="form-control-sm border-style input-border-style rounded col-11 text-muted px-2"
                                name="model" id="model">
                                <option value="" disabled selected>MODEL</option>
                                <option value="civic">Civic</option>
                                <option value="corolla">Corolla</option>
                            </select>
                        </div>
                        <div class="col-3 p-0">
                            <select class="form-control-sm border-style input-border-style rounded col-11 text-muted px-2"
                                name="status" id="status_veicle">
                                <option value="" disabled selected>STATUS</option>
                                <option value="new_order">New Order</option>
                                <option value="posted">Posted</option>
                                <option value="dispatch">Dispatch</option>
                                <option value="on_hand">On Hand</option>
                                <option value="no_titles">No Titles</option>
                                <option value="towing">Towing</option>
                            </select>
                        </div>
                        {{-- <div class="col-4 p-0">
                            <select class="form-control-sm border-style input-border-style rounded col-11 text-muted px-2"
                                name="model" id="model">
                                <option value="" disabled selected>MODEL</option>
                                <option value="civic">Civic</option>
                                <option value="corolla">Corolla</option>
                            </select>
                        </div> --}}
                    </div>
                </div>
                <div class="border-style-search px-3 pt-4 pb-2 d-flex justify-content-between">
                    <div class="col-1 p-0 d-flex align-items-center text-muted">
                        <div class="col-12 d-flex justify-content-center px-1">
                            <select class="form-control-sm border-style rounded col-12" name="pagination">
                                <option value="100">100</option>
                                <option value="200">200</option>
                                <option value="300">300</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-11 d-flex justify-content-end align-items-center">
                        <div class="col-7 p-0 d-flex justify-content-end">
                            <input type="text"
                                class="form-control-sm border-style border-info rounded col-7 text-dark text-left"
                                name="search" placeholder="Search">
                        </div>
                        <div class="col-2 px-3 d-flex justify-content-end">
                            <a href="{{ route('customer.export') }}"
                                class="px-1 text-muted font-size form-contorl-sm border p-1 rounded col-12"
                                style="background: #DBDBDB; cursor: pointer;">
                                <div class="d-flex justify-content-center align-items-center px-1">
                                    <svg width="18" height="24" viewBox="0 0 24 24" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path d="M11 16H13V7H16L12 2L8 7H11V16Z" fill="#8F8F8F" />
                                        <path
                                            d="M5 22H19C20.103 22 21 21.103 21 20V11C21 9.897 20.103 9 19 9H15V11H19V20H5V11H9V9H5C3.897 9 3 9.897 3 11V20C3 21.103 3.897 22 5 22Z"
                                            fill="#8F8F8F" />
                                    </svg>
                                    <span class="pl-1 font-size">Export</span>
                                </div>
                            </a>
                        </div>
                        <div class="px-0 d-flex justify-content-end">
                            <button type="button"
                                class="text-white form-control-sm border py-1 btn-info rounded modal_button px-2"
                                style="background: #696CFF;" data-target="#exampleModal" id="vehicle">
                                <div class="d-flex justify-content-center align-items-center">
                                    <a class="text-white d-flex align-items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="24"
                                            fill="white" viewBox="0 0 512 512">
                                            <path
                                                d="M135.2 117.4L109.1 192H402.9l-26.1-74.6C372.3 104.6 360.2 96 346.6 96H165.4c-13.6 0-25.7 8.6-30.2 21.4zM39.6 196.8L74.8 96.3C88.3 57.8 124.6 32 165.4 32H346.6c40.8 0 77.1 25.8 90.6 64.3l35.2 100.5c23.2 9.6 39.6 32.5 39.6 59.2V400v48c0 17.7-14.3 32-32 32H448c-17.7 0-32-14.3-32-32V400H96v48c0 17.7-14.3 32-32 32H32c-17.7 0-32-14.3-32-32V400 256c0-26.7 16.4-49.6 39.6-59.2zM128 288c0-17.7-14.3-32-32-32s-32 14.3-32 32s14.3 32 32 32s32-14.3 32-32zm288 32c17.7 0 32-14.3 32-32s-14.3-32-32-32s-32 14.3-32 32s14.3 32 32 32z" />
                                        </svg>
                                        <span class="pl-2 font-size">Add New Vehicle</span></a>
                                </div>
                            </button>
                        </div>
                    </div>
                </div>
                {{-- search filter end --}}
                <div class="mt-2 bg-light" style="height: 100%;overflow-x: scroll;">
                    <table id="vehicle_table" class="table scroll">
                        <thead class="bg-custom text-dark">
                            @if (@$records->count() == 0)
                                <tr class="font-size">
                                    <td colspan="9" class="h6 text-muted text-center">NO CUSTOMERS TO DISPLAY</td>
                                </tr>
                            @endif
                            <tr class="font-size">
                                <th class="font-bold-tr">Sr</th>
                                <th class="font-bold-tr">Customer Name</th>
                                <th class="font-bold-tr">VIN</th>
                                <th class="font-bold-tr">YEAR</th>
                                <th class="font-bold-tr">MAKE</th>
                                <th class="font-bold-tr">MODEL</th>
                                <th class="font-bold-tr">VEHICLE TYPE</th>
                                <th class="font-bold-tr">VALUE</th>
                                <th class="font-bold-tr">STATUS</th>
                                <th class="font-bold-tr">BUYER</th>
                                <th class="sorttable_nosort font-bold-tr">Action</th>
                            </tr>
                        </thead>
                        {{-- <tbody class="bg-white font-size" id="tbody">
                            @foreach ($records as $val)
                                <tr style="border-bottom: 1.2px solid rgba(191, 191, 191, 1) !important">
                                    <td>{{ @$val['id'] }}</td>
                                    <td class="d-block">
                                        <div>
                                            <span><b>{{ @$val['customer_name'] }}</b></span>
                                        </div>
                                        <div>
                                            <span style="font-size: 12px !important;">{{ @$val['lead'] }}</span>
                                        </div>
                                    </td>
                                    <td>{{ @$val['level'] }}</td>
                                    <td>{{ @$val['phone'] }}</td>
                                    <td>{{ @$val['address'] }}</td>
                                    <td>
                                        @if (@$val['status'] == '1')
                                            <div class="font-size badge badge-success py-1 px-2 rounded"
                                                style="font-weight:500;">Active</div>
                                        @else
                                            <div class="font-size badge badge-danger py-1 px-2 rounded"
                                                style="font-weight:500;">In Active</div>
                                        @endif
                                    </td>
                                    <td>{{ @$val['zip_code'] }}</td>
                                    <td>
                                        <button class="edit-button">
                                            <a href={{ url(@$module['action'] . '/edit/' . @$val[@$module['db_key']]) }}>
                                                <svg width="14" height="13" viewBox="0 0 16 16" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M2.66708 14.0004C2.72022 14.0068 2.77394 14.0068 2.82708 14.0004L5.49375 13.3338C5.61205 13.3056 5.7204 13.2457 5.80708 13.1604L14.0004 4.94042C14.2488 4.69061 14.3881 4.35267 14.3881 4.00042C14.3881 3.64818 14.2488 3.31024 14.0004 3.06042L12.9471 2.00042C12.8233 1.87646 12.6762 1.77811 12.5143 1.71101C12.3525 1.64391 12.179 1.60938 12.0037 1.60938C11.8285 1.60938 11.655 1.64391 11.4932 1.71101C11.3313 1.77811 11.1842 1.87646 11.0604 2.00042L2.86708 10.1938C2.78094 10.2808 2.71891 10.3888 2.68708 10.5071L2.02042 13.1738C1.99645 13.26 1.99011 13.3502 2.00177 13.439C2.01342 13.5277 2.04284 13.6133 2.08826 13.6904C2.13368 13.7676 2.19417 13.8348 2.26613 13.888C2.33808 13.9413 2.42003 13.9795 2.50708 14.0004C2.56022 14.0068 2.61394 14.0068 2.66708 14.0004ZM12.0004 2.94042L13.0604 4.00042L12.0004 5.06042L10.9471 4.00042L12.0004 2.94042ZM3.94042 11.0071L10.0004 4.94042L11.0604 6.00042L4.99375 12.0671L3.58708 12.4138L3.94042 11.0071Z"
                                                        fill="#2C77E7" />
                                                </svg>

                                            </a>
                                        </button>
                                        <button class="profile-button">
                                            <a href={{ route('customer.profile') . '/' . @$val[@$module['db_key']] }}>
                                                <svg width="14" height="13" viewBox="0 0 16 14" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M16 7C16 7 13 2.1875 8 2.1875C3 2.1875 0 7 0 7C0 7 3 11.8125 8 11.8125C13 11.8125 16 7 16 7ZM1.173 7C1.65651 6.35698 2.21264 5.7581 2.833 5.21237C4.12 4.0845 5.88 3.0625 8 3.0625C10.12 3.0625 11.879 4.0845 13.168 5.21237C13.7884 5.7581 14.3445 6.35698 14.828 7C14.77 7.07613 14.706 7.16013 14.633 7.252C14.298 7.672 13.803 8.232 13.168 8.78763C11.879 9.9155 10.119 10.9375 8 10.9375C5.88 10.9375 4.121 9.9155 2.832 8.78763C2.21165 8.2419 1.65552 7.64301 1.172 7H1.173Z"
                                                        fill="#048B52" />
                                                    <path
                                                        d="M8 4.8125C7.33696 4.8125 6.70107 5.04297 6.23223 5.4532C5.76339 5.86344 5.5 6.41984 5.5 7C5.5 7.58016 5.76339 8.13656 6.23223 8.5468C6.70107 8.95703 7.33696 9.1875 8 9.1875C8.66304 9.1875 9.29893 8.95703 9.76777 8.5468C10.2366 8.13656 10.5 7.58016 10.5 7C10.5 6.41984 10.2366 5.86344 9.76777 5.4532C9.29893 5.04297 8.66304 4.8125 8 4.8125ZM4.5 7C4.5 6.18777 4.86875 5.40882 5.52513 4.83449C6.1815 4.26016 7.07174 3.9375 8 3.9375C8.92826 3.9375 9.8185 4.26016 10.4749 4.83449C11.1313 5.40882 11.5 6.18777 11.5 7C11.5 7.81223 11.1313 8.59118 10.4749 9.16551C9.8185 9.73984 8.92826 10.0625 8 10.0625C7.07174 10.0625 6.1815 9.73984 5.52513 9.16551C4.86875 8.59118 4.5 7.81223 4.5 7Z"
                                                        fill="#048B52" />
                                                </svg>

                                            </a>
                                        </button>
                                        <button class="delete-button">
                                            <a href={{ url(@$module['action'] . '/delete/' . @$val[@$module['db_key']]) }}>
                                                <svg width="14" height="13" viewBox="0 0 12 12" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M5 3H7C7 2.73478 6.89464 2.48043 6.70711 2.29289C6.51957 2.10536 6.26522 2 6 2C5.73478 2 5.48043 2.10536 5.29289 2.29289C5.10536 2.48043 5 2.73478 5 3V3ZM4 3C4 2.46957 4.21071 1.96086 4.58579 1.58579C4.96086 1.21071 5.46957 1 6 1C6.53043 1 7.03914 1.21071 7.41421 1.58579C7.78929 1.96086 8 2.46957 8 3H10.5C10.6326 3 10.7598 3.05268 10.8536 3.14645C10.9473 3.24021 11 3.36739 11 3.5C11 3.63261 10.9473 3.75979 10.8536 3.85355C10.7598 3.94732 10.6326 4 10.5 4H10.059L9.616 9.17C9.57341 9.66923 9.34499 10.1343 8.97593 10.4732C8.60686 10.8121 8.12405 11.0001 7.623 11H4.377C3.87595 11.0001 3.39314 10.8121 3.02407 10.4732C2.65501 10.1343 2.42659 9.66923 2.384 9.17L1.941 4H1.5C1.36739 4 1.24021 3.94732 1.14645 3.85355C1.05268 3.75979 1 3.63261 1 3.5C1 3.36739 1.05268 3.24021 1.14645 3.14645C1.24021 3.05268 1.36739 3 1.5 3H4ZM7.5 6C7.5 5.86739 7.44732 5.74021 7.35355 5.64645C7.25979 5.55268 7.13261 5.5 7 5.5C6.86739 5.5 6.74021 5.55268 6.64645 5.64645C6.55268 5.74021 6.5 5.86739 6.5 6V8C6.5 8.13261 6.55268 8.25979 6.64645 8.35355C6.74021 8.44732 6.86739 8.5 7 8.5C7.13261 8.5 7.25979 8.44732 7.35355 8.35355C7.44732 8.25979 7.5 8.13261 7.5 8V6ZM5 5.5C5.13261 5.5 5.25979 5.55268 5.35355 5.64645C5.44732 5.74021 5.5 5.86739 5.5 6V8C5.5 8.13261 5.44732 8.25979 5.35355 8.35355C5.25979 8.44732 5.13261 8.5 5 8.5C4.86739 8.5 4.74021 8.44732 4.64645 8.35355C4.55268 8.25979 4.5 8.13261 4.5 8V6C4.5 5.86739 4.55268 5.74021 4.64645 5.64645C4.74021 5.55268 4.86739 5.5 5 5.5V5.5ZM3.38 9.085C3.4013 9.3347 3.51558 9.5673 3.70022 9.73676C3.88486 9.90621 4.12639 10.0002 4.377 10H7.623C7.87344 9.9999 8.11472 9.90584 8.29915 9.73642C8.48357 9.56699 8.59771 9.33453 8.619 9.085L9.055 4H2.945L3.381 9.085H3.38Z"
                                                        fill="#EF5757" />
                                                </svg>

                                            </a>
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody> --}}
                        <tbody class="bg-white font-size" id="">
                            <?php $i = 1; ?>
                            @foreach ($records as $val)
                                <tr>
                                    <td>{{ @$i }}</td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div style="vertical-align: middle">
                                                <img src="{{ asset('images/user.png') }}" alt=""
                                                    style="width:22px;height:22px;vertical-align:middle;margin-right:8px;
                                                margin-top:6px;">

                                            </div>
                                            <div>
                                                {{ @$val['customer_name'] }}<br>
                                                <span style="font-size: 12px!important;">
                                                    {{ @$val->customer['customer_email'] }}

                                                </span>
                                            </div>
                                        </div>


                                    </td>
                                    <td>{{ @$val['vin'] }}</td>
                                    <td>{{ @$val['year'] }}</td>
                                    <td>{{ @$val['make'] }}</td>
                                    <td>{{ @$val['model'] }}</td>
                                    <td>{{ @$val['vehicle_type'] }}</td>
                                    <td>{{ @$val['value'] }}</td>
                                    <td>{{ @$val['status'] }}</td>
                                    <td>{{ @$val['customer']['customer_name'] }}</td>
                                    <td>
                                        <button class="edit-button">
                                            <a href={{ url(@$module['action'] . '/edit/' . @$val[@$module['db_key']]) }}>
                                                <svg width="14" height="13" viewBox="0 0 16 16" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M2.66708 14.0004C2.72022 14.0068 2.77394 14.0068 2.82708 14.0004L5.49375 13.3338C5.61205 13.3056 5.7204 13.2457 5.80708 13.1604L14.0004 4.94042C14.2488 4.69061 14.3881 4.35267 14.3881 4.00042C14.3881 3.64818 14.2488 3.31024 14.0004 3.06042L12.9471 2.00042C12.8233 1.87646 12.6762 1.77811 12.5143 1.71101C12.3525 1.64391 12.179 1.60938 12.0037 1.60938C11.8285 1.60938 11.655 1.64391 11.4932 1.71101C11.3313 1.77811 11.1842 1.87646 11.0604 2.00042L2.86708 10.1938C2.78094 10.2808 2.71891 10.3888 2.68708 10.5071L2.02042 13.1738C1.99645 13.26 1.99011 13.3502 2.00177 13.439C2.01342 13.5277 2.04284 13.6133 2.08826 13.6904C2.13368 13.7676 2.19417 13.8348 2.26613 13.888C2.33808 13.9413 2.42003 13.9795 2.50708 14.0004C2.56022 14.0068 2.61394 14.0068 2.66708 14.0004ZM12.0004 2.94042L13.0604 4.00042L12.0004 5.06042L10.9471 4.00042L12.0004 2.94042ZM3.94042 11.0071L10.0004 4.94042L11.0604 6.00042L4.99375 12.0671L3.58708 12.4138L3.94042 11.0071Z"
                                                        fill="#2C77E7" />
                                                </svg>

                                            </a>
                                        </button>
                                        <button class="delete-button">
                                            <a href={{ url(@$module['action'] . '/delete/' . @$val[@$module['db_key']]) }}>
                                                <svg width="14" height="13" viewBox="0 0 12 12" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M5 3H7C7 2.73478 6.89464 2.48043 6.70711 2.29289C6.51957 2.10536 6.26522 2 6 2C5.73478 2 5.48043 2.10536 5.29289 2.29289C5.10536 2.48043 5 2.73478 5 3V3ZM4 3C4 2.46957 4.21071 1.96086 4.58579 1.58579C4.96086 1.21071 5.46957 1 6 1C6.53043 1 7.03914 1.21071 7.41421 1.58579C7.78929 1.96086 8 2.46957 8 3H10.5C10.6326 3 10.7598 3.05268 10.8536 3.14645C10.9473 3.24021 11 3.36739 11 3.5C11 3.63261 10.9473 3.75979 10.8536 3.85355C10.7598 3.94732 10.6326 4 10.5 4H10.059L9.616 9.17C9.57341 9.66923 9.34499 10.1343 8.97593 10.4732C8.60686 10.8121 8.12405 11.0001 7.623 11H4.377C3.87595 11.0001 3.39314 10.8121 3.02407 10.4732C2.65501 10.1343 2.42659 9.66923 2.384 9.17L1.941 4H1.5C1.36739 4 1.24021 3.94732 1.14645 3.85355C1.05268 3.75979 1 3.63261 1 3.5C1 3.36739 1.05268 3.24021 1.14645 3.14645C1.24021 3.05268 1.36739 3 1.5 3H4ZM7.5 6C7.5 5.86739 7.44732 5.74021 7.35355 5.64645C7.25979 5.55268 7.13261 5.5 7 5.5C6.86739 5.5 6.74021 5.55268 6.64645 5.64645C6.55268 5.74021 6.5 5.86739 6.5 6V8C6.5 8.13261 6.55268 8.25979 6.64645 8.35355C6.74021 8.44732 6.86739 8.5 7 8.5C7.13261 8.5 7.25979 8.44732 7.35355 8.35355C7.44732 8.25979 7.5 8.13261 7.5 8V6ZM5 5.5C5.13261 5.5 5.25979 5.55268 5.35355 5.64645C5.44732 5.74021 5.5 5.86739 5.5 6V8C5.5 8.13261 5.44732 8.25979 5.35355 8.35355C5.25979 8.44732 5.13261 8.5 5 8.5C4.86739 8.5 4.74021 8.44732 4.64645 8.35355C4.55268 8.25979 4.5 8.13261 4.5 8V6C4.5 5.86739 4.55268 5.74021 4.64645 5.64645C4.74021 5.55268 4.86739 5.5 5 5.5V5.5ZM3.38 9.085C3.4013 9.3347 3.51558 9.5673 3.70022 9.73676C3.88486 9.90621 4.12639 10.0002 4.377 10H7.623C7.87344 9.9999 8.11472 9.90584 8.29915 9.73642C8.48357 9.56699 8.59771 9.33453 8.619 9.085L9.055 4H2.945L3.381 9.085H3.38Z"
                                                        fill="#EF5757" />
                                                </svg>

                                            </a>
                                        </button>
                                    </td>
                                </tr>
                                <?php $i++; ?>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="d-flex justify-content-end p-2" id="page">
                    {{-- <div>
                        <div>
                            <p>
                                Displaying {{ $records->count() }} of {{ $records->total() }} customer(s).
                            </p>
                        </div>
                        <div>
                            {{ $records->links() }}
                        </div>
                    </div> --}}
                </div>
            </div>
        </div>
        {{-- listing end --}}
    </div>

    {{-- New Design --}}

    <script>
        $(".vehicl_navbar_img").click(function() {
            $(".vehicl_navbar_img.active").removeClass('active')
            $(this).addClass('active')
        });

        $(".vehicles_3navbar").click(function() {
            $(".vehicles_3navbar.activee").removeClass('activee')
            $(this).addClass('activee')
        });
    </script>
@endsection
