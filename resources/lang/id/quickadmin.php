<?php

return [
		'user-management' => [		'title' => 'User Management',		'created_at' => 'Time',		'fields' => [		],	],
		'roles' => [		'title' => 'Roles',		'created_at' => 'Time',		'fields' => [			'title' => 'Title',		],	],
		'users' => [		'title' => 'Users',		'created_at' => 'Time',		'fields' => [			'name' => 'First name',			'last-name' => 'Last name',			'email' => 'Email',			'phone' => 'Phone',			'password' => 'Password',			'role' => 'Role',			'remember-token' => 'Remember token',		],	],
		'house' => [		'title' => 'House',		'created_at' => 'Time',		'fields' => [			'landlord' => 'Landlord id',			'tenant' => 'Tenant id',			'city' => 'City',			'address' => 'Address',		],	],
		'bill' => [		'title' => 'Bill',		'created_at' => 'Time',		'fields' => [			'type' => 'Type',			'total' => 'Total',			'house' => 'House id',		],	],
		'task' => [		'title' => 'Task',		'created_at' => 'Time',		'fields' => [			'content' => 'Content',			'photo' => 'Photo',			'house' => 'House id',		],	],
		'message' => [		'title' => 'Message',		'created_at' => 'Time',		'fields' => [			'content' => 'Content',			'house' => 'House id',			'user' => 'User id',			'created-by' => 'Created by',		],	],
		'documents' => [		'title' => 'Documents',		'created_at' => 'Time',		'fields' => [			'title' => 'Title',			'file' => 'File',			'house' => 'House id',			'content' => 'Content',		],	],
	'qa_create' => 'Buat',
	'qa_save' => 'Simpan',
	'qa_edit' => 'Edit',
	'qa_view' => 'Lihat',
	'qa_update' => 'Update',
	'qa_list' => 'Daftar',
	'qa_no_entries_in_table' => 'Tidak ada data di tabel',
	'custom_controller_index' => 'Controller index yang sesuai kebutuhan Anda.',
	'qa_logout' => 'Keluar',
	'qa_add_new' => 'Tambahkan yang baru',
	'qa_are_you_sure' => 'Anda yakin?',
	'qa_back_to_list' => 'Kembali ke daftar',
	'qa_dashboard' => 'Dashboard',
	'qa_delete' => 'Hapus',
	'quickadmin_title' => 'NewLaraTenant',
];