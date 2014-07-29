<ul>
    <li>
		<span>id</span>
		<span>name</span>
	</li>	
<% _.each(users, function (user, i) { %>
	<li  class="link" data-url="user/<%= user.id %>/">
		<span><%= user.id %></span>
		<span><%= user.name %></span>
	</li>	
<% }); %>
</ul>