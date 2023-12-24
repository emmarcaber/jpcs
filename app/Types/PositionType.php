<?php

namespace App\Types;

enum PositionType
{
    case SUPER_ADMIN;
    case CHAIRMAN;
    case PRESIDENT;
    case VICE_INTERNAL;
    case VICE_EXTERNAL;
    case SECRETARY;
    case ASSISTANT_SECRETARY;
    case TREASURER;
    case ASSISTANT_TREASURER;
    case AUDITOR;
    case DIRECTOR_MEMBERSHIP;
    case DIRECTOR_PROJECTS;
    case DIRECTOR_PR;
    case BSIT_REP;
    case BSCS_REP;
    case BLIS_REP;
    case BSIS_REP;
    case COMITTEE_INTERNATIONAL_LINKAGES;
    case COMITTEE_SERVICES_INFORMATION;
    case COMITTEE_MEMBERSHIP;
    case COMITTEE_PROFESSIONAL_DEVELOPMENT;
    case COMITTEE_CREATIVES;
    case COMITTEE_CORPORATE_RELATIONS;
    case STUDENT;

    public function value(): string
    {
        return match ($this) {
            self::SUPER_ADMIN => 'Super Admin',
            self::CHAIRMAN => 'Chairman',
            self::PRESIDENT => 'President',
            self::VICE_INTERNAL => 'Vice – President for Internal Affairs',
            self::VICE_EXTERNAL => 'Vice – President for External Affairs',
            self::SECRETARY => 'Secretary',
            self::ASSISTANT_SECRETARY => 'Assistant Secretary',
            self::TREASURER => 'Treasurer',
            self::ASSISTANT_TREASURER => 'Assistant Treasurer',
            self::AUDITOR => 'Auditor',
            self::DIRECTOR_MEMBERSHIP => 'Director for Membership',
            self::DIRECTOR_PROJECTS => 'Director for Projects',
            self::DIRECTOR_PR => 'Director for Public Relations',
            self::BSIT_REP => 'BSIT Representative',
            self::BSCS_REP => 'BSCS Representative',
            self::BLIS_REP => 'BLIS Representative',
            self::BSIS_REP => 'BSIS Representative',
            self::COMITTEE_INTERNATIONAL_LINKAGES => 'Member, Committee on International Linkages',
            self::COMITTEE_SERVICES_INFORMATION => 'Member, Committee on Services and Information',
            self::COMITTEE_MEMBERSHIP => 'Member, Committee on Membership',
            self::COMITTEE_PROFESSIONAL_DEVELOPMENT => 'Member, Committee on Professional Development Projects',
            self::COMITTEE_CREATIVES => 'Member, Committee on Creatives',
            self::COMITTEE_CORPORATE_RELATIONS => 'Member, Committee on Corporate Relations',
            self::STUDENT => 'Student',
        };
    }
}
