<?php
return [
    // navbar
    'dashboard' => 'Dashboard',
    'post_item' => 'Post an Item',
    'logout' => 'Logout',

    // dashboard table
    'image' => 'Image',
    'name' => 'Name',
    'location' => 'Location',
    'date_found' => 'Date Found',
    'status' => 'Status',
    'action' => 'Action',

    // view dropdown
    'view' => 'View',
    'view_all' => 'All',
    'view_unclaimed' => 'Unclaimed',
    'view_claimed' => 'Claimed',
    'view_transfer' => 'Viable to Transfer',
    'view_transferred' => 'Transferred',

    // status badges (key = status value in the database)
    'status_unclaimed' => 'Unclaimed',
    'status_transferred' => 'Transferred',
    'status_claimed' => 'Claimed',

    // buttons
    'record_claim' => 'Record Claim',
    'transfer' => 'Transfer',
    'reprint_slip' => 'Reprint Claim Slip',
    'cancel_claim' => 'Cancel Claim',
    'edit' => 'Edit',
    'delete' => 'Delete',
    'back_to_dashboard' => 'Back to dashboard',

    // confirm popups
    'confirm_cancel_claim' => 'Cancel this claim?',
    'confirm_delete' => 'Delete this item? This cannot be undone.',

    // item detail (officer panel)
    'claimed_by' => 'Claimed by :name on :date',

    // item forms
    'log_item_title' => 'Log a found item',
    'edit_item_title' => 'Edit item',
    'description' => 'Description',
    'category' => 'Category',
    'choose' => 'Choose...',
    'location_found' => 'Location found',
    'photo' => 'Photo',
    'keep_photo_hint' => 'Leave empty to keep the current photo.',
    'save_item' => 'Save item',
    'save_changes' => 'Save changes',

    // claim form
    'claimant_name' => 'Claimant Name',
    'email' => 'Email',
    'phone' => 'Phone',
    'nim' => 'NIM',

    // flash messages
    'flash_item_logged' => 'Item logged.',
    'flash_item_updated' => 'Item updated.',
    'flash_item_deleted' => 'Item deleted.',
    'flash_item_transferred' => 'Marked as transferred to BM (Business Management).',
    'flash_already_claimed' => 'That item is already claimed.',
    'flash_claim_reverted' => 'Claim reverted.',
];
