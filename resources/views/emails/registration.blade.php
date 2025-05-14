<h2>New Registration Received</h2>
<ul>
    <li><strong>Full Name:</strong> {{ $details['full_name'] }}</li>
    <li><strong>School Name:</strong> {{ $details['school_name'] }}</li>
    <li><strong>Designation:</strong> {{ $details['designation'] }}</li>
    <li><strong>Email:</strong> {{ $details['email'] }}</li>
    <li><strong>Mobile Number:</strong> {{ $details['mobile_number'] ?? 'null' }}</li>
    <li><strong>Preferred Month:</strong> {{ $details['preferred_month'] }}</li>
    <li><strong>Estimated Participants:</strong> {{ $details['estimated_participants'] }}</li>
    <li><strong>Notes:</strong> {{ $details['additional_notes'] ?? 'null' }}</li>
</ul>
