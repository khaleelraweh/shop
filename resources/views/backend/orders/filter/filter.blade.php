<div class="card-body">
    <form action="{{ route('admin.orders.index') }}" method="get">
        <div class="row">

            <div class="col-8 col-sm-4 col-md-2">
                <div class="form-group">
                    <input type="text" name="keyword" value="{{ old('keyword', request()->input('keyword')) }}"
                        class="form-control" placeholder="إبحث هنا ">
                </div>
            </div>
            <div class="col-md-2 d-none d-md-block">
                <div class="form-group">
                    <select name="status" class="form-control">
                        <option value="">حالة الطلب</option>
                        <option value="0" {{ old('status', request()->input('status')) == '0' ? 'selected' : '' }}>
                            طلب جديد

                        </option>
                        <option value="1" {{ old('status', request()->input('status')) == '1' ? 'selected' : '' }}>
                            تم الدفع
                        </option>
                        <option value="2" {{ old('status', request()->input('status')) == '2' ? 'selected' : '' }}>
                            تحت العملية
                        </option>
                        <option value="3" {{ old('status', request()->input('status')) == '3' ? 'selected' : '' }}>
                            انتهي
                        </option>
                        <option value="4" {{ old('status', request()->input('status')) == '4' ? 'selected' : '' }}>
                            مرفوض
                        </option>
                        <option value="5" {{ old('status', request()->input('status')) == '5' ? 'selected' : '' }}>
                            ألغيت
                        </option>
                        <option value="6" {{ old('status', request()->input('status')) == '6' ? 'selected' : '' }}>
                            استرداد طلب
                        </option>
                        <option value="7" {{ old('status', request()->input('status')) == '7' ? 'selected' : '' }}>
                            تم الاسترداد
                        </option>
                        <option value="8"
                            {{ old('status', request()->input('status')) == '8' ? 'selected' : '' }}>
                            تم اعادة الطلب
                        </option>
                    </select>
                </div>
            </div>
            <div class="d-none d-sm-block col-sm-4 col-md-2">
                <div class="form-group">
                    <select name="sort_by" class="form-control">
                        <option value="">بحث عام</option>
                        <option value="ref_id"
                            {{ old('sort_by', request()->input('sort_by')) == 'ref_id' ? 'selected' : '' }}>رقم المرجع
                        </option>

                        {{-- <option value="first_name"
                            {{ old('sort_by', request()->input('sort_by')) == 'first_name' ? 'selected' : '' }}>اسم
                            العميل
                        </option>

                        <option value="last_name"
                            {{ old('sort_by', request()->input('sort_by')) == 'last_name' ? 'selected' : '' }}>لقب
                            العميل
                        </option>

                        <option value="username"
                            {{ old('sort_by', request()->input('sort_by')) == 'username' ? 'selected' : '' }}>اسم
                            المستخدم
                        </option>

                        <option value="email"
                            {{ old('sort_by', request()->input('sort_by')) == 'email' ? 'selected' : '' }}>
                            الايميل
                        </option>

                        <option value="created_at"
                            {{ old('sort_by', request()->input('sort_by')) == 'created_at' ? 'selected' : '' }}>
                            تاريخ الانشاء
                        </option> --}}

                    </select>
                </div>
            </div>
            <div class="col-md-2 d-none d-md-block">
                <div class="form-group">
                    <select name="order_by" class="form-control">
                        <option value="">ترتيب</option>
                        <option value="asc"
                            {{ old('order_by', request()->input('order_by')) == 'asc' ? 'selected' : '' }}>تصاعدي
                        </option>
                        <option value="desc"
                            {{ old('order_by', request()->input('order_by')) == 'desc' ? 'selected' : '' }}>تنازلي
                        </option>
                    </select>
                </div>
            </div>
            <div class="col-md-1 d-none d-md-block">
                <div class="form-group">
                    <select name="limit_by" class="form-control">
                        <option value="">عدد</option>
                        <option value="10"
                            {{ old('limit_by', request()->input('limit_by')) == '10' ? 'selected' : '' }}>10</option>
                        <option value="20"
                            {{ old('limit_by', request()->input('limit_by')) == '20' ? 'selected' : '' }}>20</option>
                        <option value="50"
                            {{ old('limit_by', request()->input('limit_by')) == '50' ? 'selected' : '' }}>50</option>
                        <option value="100"
                            {{ old('limit_by', request()->input('limit_by')) == '100' ? 'selected' : '' }}>100</option>
                    </select>
                </div>
            </div>
            <div class="col-2 col-sm-2 col-md-2">
            </div>
            <div class="col-2 col-sm-2 col-md-1">
                <div class="form-group">
                    <button type="submit" name="submit" class="btn btn-link">بحث</button>
                </div>
            </div>

        </div>
    </form>
</div>
