<div id="card-widgets" calss="seaction">
	<div class="row">
		<div class="col s12 m5 14">
			<div id="profile-card" class="card" style="overflow: visible;">
				<div class="card-image waves-effect waves-block waves-light">
					<img class="activator" src="../assets/images/gallary/13.PNG" alt="user bg">
				</div>
				<div class="card-content">
					<img src="../assets/images/avatar/avatar-6.PNG" alt="" class="circle responsive-img activator card-profile-image cyan lighten-1 padding-2">
					<a class="btn-floating activator btn-move-up waves-effect waves-light red accent-2 z-depth-4 right">
						<i class="material-icons">edit</i>
					</a>
					<p class="card-title activator grey-text text-darken-4"><?=$this->session->userdata('sesNip')?></p>
					<p><i class="material-icons profile-card-i" >perm_identity </i><?=$this->session->userdata('sesNama')?> </p>
					<p><i class="material-icons profile-card-i">perm_phone_msg</i><?=$this->session->userdata('sesno_hp')?> </p>
					<p><i class="material-icons profile-card-i">email</i><?=$this->session->userdata('sesEmail')?></p>
				</div>
				<div class="card-reveal" style="display: none; transform: translateY(0%);">
					<span class="card-title grey-text text-darken-4"><?=$this->session->userdata('sesNama')?> <i class="material-icons right">close</i>
					</span>
					<p>Here is some more information about this card.</p>
					<p><i class="material-icons">perm_identity</i> Project Manager</p>
					<p><i class="material-icons">perm_phone_msg</i> <?=$this->session->userdata('sesno_hp')?></p>
					<p><i class="material-icons">email</i> <?=$this->session->userdata('sesEmail')?></p>
					<p><i class="material-icons">cake</i> <?=$this->session->userdata('sesTempat')?>, <?=$this->session->userdata('sesTtl')?></p>
					<p></p>
					<p><i class="material-icons">account_balance</i> <?=$this->session->userdata('sesAlamat')?></p>
					<p></p>
				</div>
			</div>
		</div>
	  
		<div class="col s12 m4 l4">
			<ul id="task-card" class="collection with-header">
				<li class="collection-header teal accent-4">
					<h4 class="task-card-title">My Task</h4>
					<p class="task-card-date">Sept 16, 2017</p>
				</li>
				<li class="collection-item dismissable">
					<input type="checkbox" id="task1" />
					<label for="task1">Create Mobile App UI.
					<a href="#" class="secondary-content">
						<span class="ultra-small">Today</span>
					</a>
					</label>
					<span class="task-cat cyan">Mobile App</span>
				</li>
				<li class="collection-item dismissable">
					<input type="checkbox" id="task2" />
					<label for="task2">Check the new API standerds.
					<a href="#" class="secondary-content">
						<span class="ultra-small">Monday</span>
					</a>
					</label>
					<span class="task-cat red accent-2">Web API</span>
				</li>
				<li class="collection-item dismissable">
					<input type="checkbox" id="task3" checked="checked" />
					<label for="task3">Check the new Mockup of ABC.
					<a href="#" class="secondary-content">
						<span class="ultra-small">Wednesday</span>
					</a>
					</label>
					<span class="task-cat teal accent-4">Mockup</span>
				</li>
				<li class="collection-item dismissable">
					<input type="checkbox" id="task4" checked="checked" disabled="disabled" />
					<label for="task4">I did it !</label>
					<span class="task-cat deep-orange accent-2">Mobile App</span>
				</li>
			</ul>
		</div>		  
	</div>
</div>
