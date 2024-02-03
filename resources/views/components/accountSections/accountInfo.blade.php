<form class="mb-12 px-6 py-12 w-full md:max-w-md lg:max-w-xl xl:max-w-3xl mx-auto border border-gray-400 rounded-lg">
    <div class="space-y-12">
        <div class="border-b border-gray-900/10 pb-12">
            <h2 class="text-base font-semibold leading-7 text-gray-900">Account info</h2>
            <p class="mt-1 text-sm leading-6 text-gray-600">This information will not be shared publicly.</p>
            <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                <div class="sm:col-span-4">
                    <label for="member_id" class="mb-2 block text-sm font-medium leading-6 text-gray-900">Member
                        ID</label>
                    <div>
                        <p>448982-324432-24243</p>
                    </div>
                </div>
                <div class="sm:col-span-4">
                    <label for="member_id" class="mb-2 block text-sm font-medium leading-6 text-gray-900">Rewards
                        points</label>
                    <div>
                        <p>0 points</p>
                    </div>
                </div>
                <div class="sm:col-span-4">
                    <label for="username" class="mb-2 block text-sm font-medium leading-6 text-gray-900">Name</label>
                    <div>
                        <p>{{ ucwords(auth()->user()->first_name) }} {{ ucwords(auth()->user()->last_name) }}</p>
                    </div>
                </div>

                <div class="sm:col-span-4">
                    <label for="email" class="mb-2 block text-sm font-medium leading-6 text-gray-900">Email
                        address</label>
                    <div>
                        <p>{{ ucwords(auth()->user()->email) }}</p>
                    </div>
                </div>

                <div class="sm:col-span-4">
                    <label for="phone" class="mb-2 block text-sm font-medium leading-6 text-gray-900">Phone
                        number</label>
                    <div>
                        <p>{{ ucwords(auth()->user()->phone_number) }}</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="sm:col-span-4">
            <div class="flex justify-end">
                <button type="submit"
                    class="rounded-md bg-red-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-red-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Delete
                    account</button>
            </div>
        </div>
    </div>
</form>
