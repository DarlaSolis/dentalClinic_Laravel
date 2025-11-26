<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'role_id',
        'is_active',
        'phone',
        'address',
        'gender' // Agregar este campo
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'is_active' => 'boolean',
        ];
    }

    // Relaciones
    public function role(): BelongsTo
    {
        return $this->belongsTo(Role::class);
    }

    /**
     * Relación con las citas donde el usuario es paciente
     */
    public function appointmentsAsPatient(): HasMany
    {
        return $this->hasMany(Appointment::class, 'patient_id');
    }

    /**
     * Relación con las citas donde el usuario es dentista
     */
    public function appointmentsAsDentist(): HasMany
    {
        return $this->hasMany(Appointment::class, 'dentist_id');
    }

    // Métodos de verificación de roles
    public function isAdmin(): bool
    {
        return $this->role_id === 1;
    }

    public function isDentist(): bool
    {
        return $this->role_id === 2;
    }

    public function isPatient(): bool
    {
        return $this->role_id === 3;
    }

    public function hasRole($role): bool
    {
        if (is_string($role)) {
            return $this->role->name === $role;
        }

        return $role->contains('name', $this->role->name);
    }

    public function getRoleNameAttribute()
    {
        return $this->role ? $this->role->display_name : 'Sin rol';
    }

    // Scopes
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopeByRole($query, $roleId)
    {
        return $query->where('role_id', $roleId);
    }

    // Métodos para género
    public function isFemale(): bool
    {
        return strtolower($this->gender) === 'femenino' || strtolower($this->gender) === 'female';
    }

    public function isMale(): bool
    {
        return strtolower($this->gender) === 'masculino' || strtolower($this->gender) === 'male';
    }

    /**
     * Obtener el título profesional (solo para dentistas)
     */
    public function getProfessionalTitleAttribute(): string
    {
        if ($this->isDentist()) {
            return $this->isFemale() ? 'Dra.' : 'Dr.';
        }
        return '';
    }

    /**
     * Obtener el nombre con título profesional si es dentista
     */
    public function getFullNameWithTitleAttribute(): string
    {
        if ($this->isDentist()) {
            return $this->professional_title . ' ' . $this->name;
        }
        return $this->name;
    }
}
