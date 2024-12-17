<?php
use Livewire\Volt\Component;
use App\Models\User;


new
#[Layout{'layout.app'}]
class extends Component{
  public function with(): array
  {
      return [
          'users' => User::limit(50)->get();
      ];
  }

  function chat(User $user) : void
  {
      $conversation = auth()->user()->createConversationWith($user);
      $this->redirectRoute(['chat',$conversation->id]);
  }

};
?>
