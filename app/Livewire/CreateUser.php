<?php

namespace App\Livewire;


use Livewire\Component;
use App\Models\User;
use Livewire\WithFileUploads;
use App\Models\Address;
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule as ValidationRule;

class CreateUser extends Component
{
    use WithFileUploads;
    public $currentTab = 'basicInfo';
    public $tabs = ['basicInfo', 'healthInfo', 'preferences'];

    public $email =  'default_email@example.com';
    public $defaultPassword = 'DefaultPasswordHere';

    // user variable

    public  $lineId, $gender, $name, $surname, $nickname, $weight, $height, $day, $month, $year, $work_type, $exercise_frequency, $sleep_pattern, $meals_per_day, $food_allergies,
            $underlying_disease,  $blood_type, $blood_ldl, $blood_hfl, $regular_medication , $side_effects, $defecation_pattern, $other_health_info;

    public $health_documents = [];

    // address variable

    public $mainaddress;

    public $location;

    public $phone;

    public $secondaryaddress;

    public $secondarylocation;

    public $secondaryphone;

    public $birthdate; // Combined birthdate
    public $interests = [];


    public function mount()
    {

    }

    public function setTab($tabName)
    {
        $this->currentTab = $tabName;
    }

    public function goToNextTab()
    {
        if ($this->currentTab === 'basicInfo') {
            $this->currentTab = 'healthInfo';
        } elseif ($this->currentTab === 'healthInfo') {
            $this->currentTab = 'preferences';
        }
        // No 'else' needed because there's no tab after 'preferences'
    }
    public function rules()
    {
        return [
            'lineId' => 'required|min:3',
            'gender' => 'required',
            'name' => 'required',
            'surname' => 'required',
            'weight' => 'required',
            'height' => 'required',
            'birthdate' => 'required',
            'interests' => 'required',
            'work_type' => 'required',
            'exercise_frequency' => 'required',
            'sleep_pattern' => 'required',
            'meals_per_day' => 'required',
            'food_allergies' => 'required',
            'underlying_disease' => 'required',
            'blood_type' => 'required',
            'blood_ldl' => 'required',
            'blood_hfl' => 'required',
            'regular_medication' => 'required',
            'side_effects' => 'required',
            'defecation_pattern' => 'required',
            'other_health_info' => 'required',
            'health_documents.*' => 'file|mines:pdf,doc,docx|max:2048', // 10MB Max for each file
            // ... Other rules
            // 'email' => 'required|email|unique:users,email',
            // ... Add other rules
        ];
    }
    public function updated($propertyName)
    {
    // This will only be triggered when any of the interests checkboxes change
    if (substr($propertyName, 0, 9) === 'interests') {
        // Count selected interests
        $selectedInterests = count(array_filter($this->interests, function ($value) {
            return $value != false; // Filter out unselected interests
        }));

        // If there are more than 2 selected interests, show an error message
        if ($selectedInterests > 2) {
            $this->addError('interests', 'You can select up to 2 interests only.');
            // Remove the last selected interest to enforce the limit
            array_pop($this->interests);
        }
    }

    // Validate the field that was updated
    $this->validateOnly($propertyName, $this->rules());
    }
    public function combineBirthdate()
    {


    if ($this->day && $this->month && $this->year) {
        // Combine day, month, and year into a formatted date
        // Ensure leading zeros for day and month
        $formattedDay = str_pad($this->day, 2, '0', STR_PAD_LEFT);
        $formattedMonth = str_pad($this->month, 2, '0', STR_PAD_LEFT);

        $this->birthdate = "{$this->year}-{$formattedMonth}-{$formattedDay}";
    }


    }
        public function updatedDay($day)
        {
            $this->combineBirthdate();
        }

        public function updatedMonth($month)
        {
            $this->combineBirthdate();
        }

        public function updatedYear($year)
        {
            $this->combineBirthdate();
        }



    public function save()
    {

        // dd($this);
        $this->validate($this->rules());

        $this->combineBirthdate(); // Ensure this is called to set the birthdate

          // Only keep interests that are set to true
        $selectedInterests = array_keys(array_filter($this->interests, function ($value) {
            return $value !== false; // Filter out unselected interests
        }));

        // // Encode the array of selected interests as a JSON string
        // $interestsJson = json_encode($selectedInterests);

        // Encode the array of selected interests as a JSON string
        // $interestsJson = json_encode(array_keys(array_filter($this->interests)));


        // Debugging: Check the birthdate value
        logger('Birthdate: ' . $this->birthdate);

        $uniqueEmail = $this->email;

         // Store the file paths after successful upload
         $storedPaths = [];
         foreach ($this->health_documents as $file) {
             // Store files in 'storage/app/public/documents'
             $path = $file->store('documents', 'public');
             if ($path) {
                 $storedPaths[] = $path; // Save the path
             } else {
                 // Handle the error appropriately
                 session()->flash('error', 'File upload failed.');
                 return; // Exit if the file saving failed
             }
         }


    // Create the user
    $user = User::create([
        'line_id' => $this->lineId,
        'gender' => $this->gender,
        'name' => $this->name,
        'surname' => $this->surname,
        'nickname' => $this->nickname,
        'weight' => $this->weight,
        'height' => $this->height,
        'birthdate' => $this->birthdate,
        'interests' => json_encode($selectedInterests), // Save the selected interests
        'work_type' => $this->work_type,
        'exercise_frequency' => $this->exercise_frequency,
        'sleep_pattern' => $this->sleep_pattern,
        'meals_per_day' => $this->meals_per_day,
        'food_allergies' => $this->food_allergies,
        'underlying_disease' => $this->underlying_disease,
        'blood_type' => $this->blood_type,
        'blood_ldl' => $this->blood_ldl,
        'blood_hfl' => $this->blood_hfl,
        'regular_medication' => $this->regular_medication,
        'side_effects' => $this->side_effects,
        'defecation_pattern' => $this->defecation_pattern,
        'other_health_info' => $this->other_health_info,
        'health_documents' => json_encode($storedPaths), // Store the JSON encoded paths
        'email' => $uniqueEmail,
        'password' => $this->defaultPassword,
    ]);

    if ($user) {
        // Update or create the address for the user
        $user->address()->updateOrCreate(
            ['user_id' => $user->id], // The condition to find the existing address
            [
                'main_address' => $this->mainaddress,
                'location' => $this->location,
                'phone' => $this->phone,
                'secondary_address' => $this->secondaryaddress,
                'secondary_location' => $this->secondarylocation,
                'secondary_phone' => $this->secondaryphone,
            ]
        );

        session()->flash('message', 'User successfully created.');
        $this->reset();
    } else {
        session()->flash('error', 'There was an issue creating the user.');
    }
    return redirect()->to('/userdetails');

    }

    public function render()
    {
        return view('livewire.create-user');
    }
}