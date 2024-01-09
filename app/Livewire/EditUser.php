<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\User;
use App\Models\Address;
use Carbon\Carbon;

class EditUser extends Component
{
    public $currentTab = 'basicInfo';
    public $tabs = ['basicInfo', 'healthInfo', 'preferences'];
    public $userId;
    public User $user;

    public $lineId, $name, $surname, $nickname, $gender, $weight, $height, $work_type, $interests = [];
    public $exercise_frequency, $sleep_pattern, $meals_per_day, $food_allergies;
    public $day, $month, $year;
    public $birthdate;
    public $underlying_disease,  $blood_type, $blood_ldl, $blood_hfl, $regular_medication , $side_effects, $defecation_pattern, $other_health_info;

    public $mainaddress, $location, $phone, $secondaryaddress, $secondarylocation, $secondaryphone;

    public function goToNextTab()
    {
        if ($this->currentTab === 'basicInfo') {
            $this->currentTab = 'healthInfo';
        } elseif ($this->currentTab === 'healthInfo') {
            $this->currentTab = 'preferences';
        }
        // No 'else' needed because there's no tab after 'preferences'
    }

    // public function setTab($tabName)
    // {
    // if (in_array($tabName, $this->tabs)) {
    //     $this->currentTab = $tabName;
    // }
    // }

    public function setTab($tabName)
    {
        $this->currentTab = $tabName;
    }


    public function mount(User $user) // Type-hint the User model
    {

      // Initialize interests
      $decodedInterests = json_decode($user->interests, true) ?: [];
      // Set all interests to false by default
      $this->interests = array_fill_keys(['general', 'anti-aging', 'diet', 'muscle', 'brian', 'pressure', 'diabetes', 'liver', 'chemo', 'cao', 'intestine'], false);

      // Now only set the user's interests to true
      foreach ($decodedInterests as $interest) {
          if(array_key_exists($interest, $this->interests)) {
              $this->interests[$interest] = true;
          }
      }


    $this->userId = $user->id;
    $this->lineId = $user->line_id;
    $this->name = $user->name;
    $this->surname = $user->surname;
    $this->nickname = $user->nickname;
    $this->gender = $user->gender;
    $this->weight = $user->weight;
    $this->height = $user->height;
    $this->work_type = $user->work_type;
    $this->exercise_frequency = $user->exercise_frequency;
    $this->sleep_pattern = $user->sleep_pattern;
    $this->meals_per_day = $user->meals_per_day;
    $this->food_allergies = $user->food_allergies;

    if ($user->birthdate) {
        $birthdate = Carbon::parse($user->birthdate);
        $this->day = $birthdate->day;
        $this->month = $birthdate->month;
        $this->year = $birthdate->year + 543; // Convert to Buddhist era if needed
    }

    $this->underlying_disease = $user->underlying_disease;
    $this->blood_type = $user->blood_type;
    $this->blood_ldl = $user->blood_ldl;
    $this->blood_hfl = $user->blood_hfl;
    $this->regular_medication = $user->regular_medication;
    $this->side_effects = $user->side_effects;
    $this->defecation_pattern = $user->defecation_pattern;
    $this->other_health_info = $user->other_health_info;

     // Load user's address or create a new one if it doesn't exist
     $address = $user->address()->firstOrCreate([
        'user_id' => $user->id,
    ]);

    // Set the address properties
    $this->mainaddress = $address->main_address;
    $this->location = $address->location;
    $this->phone = $address->phone;
    $this->secondaryaddress = $address->secondary_address;
    $this->secondarylocation = $address->secondary_location;
    $this->secondaryphone = $address->secondary_phone;

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
            // ... Other rules
            // 'email' => 'required|email|unique:users,email',
            // ... Add other rules
        ];
    }

    public function getFormattedInterestsAttribute()
    {
        return collect($this->interests)
            ->filter(function ($value, $key) {
                return $value; // Filter out unselected interests
            })
            ->keys()
            ->implode(', ');
    }


    public function updated($propertyName)
    {

    if (substr($propertyName, 0, 9) === 'interests') {
        $selectedInterestsCount = count(array_filter($this->interests));
        if ($selectedInterestsCount > 2) {
            foreach($this->interests as $key => $value) {
                if(!$value) {
                    // Set unchecked interests to null to not send them
                    $this->interests[$key] = null;
                }
            }
            $this->addError('interests', 'You can select up to 2 interests only.');
        }
    }
    }



    public function save()
    {
        // dd($this);
        // Combine the year, month, and day into a birthdate string
            $this->birthdate = Carbon::createFromDate($this->year - 543, $this->month, $this->day)->toDateString();

            // Now perform the validation
            $this->validate($this->rules());

           // Filter out the interests that are not selected (i.e., false)
            $selectedInterests = array_filter($this->interests, function ($selected) {
            return $selected === true;
            });

        $user = User::find($this->userId);
        $user->update([
            'line_id' => $this->lineId,
            'name' => $this->name,
            'surname' => $this->surname,
            'nickname' => $this->nickname,
            'gender' => $this->gender,
            'birthdate' => Carbon::createFromDate($this->year - 543, $this->month, $this->day)->toDateString(), // Convert back from Buddhist era
            'weight' => $this->weight,
            'height' => $this->height,
            'work_type' => $this->work_type,
            'interests' => json_encode(array_keys($selectedInterests)),
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
            'other_health_info' => $this->other_health_info
                        // Add other fields as necessary
        ]);

        $address = $this->user->address()->updateOrCreate([
            'user_id' => $this->user->id,
        ], [
            'main_address' => $this->mainaddress,
            'location' => $this->location,
            'phone' => $this->phone,
            'secondary_address' => $this->secondaryaddress,
            'secondary_location' => $this->secondarylocation,
            'secondary_phone' => $this->secondaryphone,
        ]);

        // Add session flash message or emit event as needed
        session()->flash('message', 'User details updated successfully.');
        return redirect()->to('/userdetails');
    }


    public function render()
    {
        // $user = User::find($this->userId);
        return view('livewire.edit-user', ['user' => $this->user]);
    }
}