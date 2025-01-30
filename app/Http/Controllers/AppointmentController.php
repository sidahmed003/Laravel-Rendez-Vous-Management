<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use Illuminate\Http\Request;
use Barryvdh\Snappy\Facades\SnappyPdf as PDF;

class AppointmentController extends Controller
{
    // Affiche le formulaire de demande de rendez-vous
    public function showForm()
    {
        return view('appointment.form');
    }

    public function store(Request $request)
{
    // Validation des données
    $validated = $request->validate([
        'first_name' => 'required|string|max:255',
        'last_name' => 'required|string|max:255',
        'email' => 'required|email|max:255',
        'reason' => 'required|in:Service Gestion,Service Contentieux,Service Budget',
        'appointment_date' => 'required|date|after_or_equal:today',
        'time_slot' => 'required|in:9h à 10h,10h à 11h,11h à 12h',
    ]);

    // Vérification si la date est un dimanche ou mardi
    $appointmentDate = \Carbon\Carbon::parse($request->appointment_date);
    if (!$appointmentDate->isSunday() && !$appointmentDate->isTuesday()) {
        return back()->withErrors(['appointment_date' => 'Le rendez-vous doit être un dimanche ou un mardi.']);
    }

    // Vérification si le créneau horaire et le motif sont déjà pris
    $existingAppointment = Appointment::where('appointment_date', $appointmentDate)
        ->where('time_slot', $request->time_slot)
        ->where('reason', $request->reason)
        ->first();

    if ($existingAppointment) {
        return back()->withErrors(['time_slot' => 'Ce créneau horaire et service sont déjà pris.']);
    }

    // Création de la demande de rendez-vous
    $validated['appointment_date'] = $appointmentDate;
    $validated['time_slot'] = $request->time_slot;

    // Création de la demande de rendez-vous et stockage dans une variable
    $appointment = Appointment::create($validated);


    // Génération du PDF avec Snappy
    $pdf = PDF::loadView('appointment.pdf', ['appointment' => $appointment]);

    // Télécharger le PDF
    return $pdf->download('confirmation_rdv.pdf');

}


    
    
}
